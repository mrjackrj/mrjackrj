<?php

require_once dirname(__FILE__).'/../lib/ordem_servicoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/ordem_servicoGeneratorHelper.class.php';

/**
 * ordem_servico actions.
 *
 * @package    mrjackrj
 * @subpackage ordem_servico
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ordem_servicoActions extends autoOrdem_servicoActions
{
  public function executeAutocomplete(sfWebRequest $request)
  {
    if($request->getParameter("type") == 'cliente') {
      $result = ClienteTable::getInstance()
        ->findClienteByName($request['q'])
        ->toKeyValueArray('id', 'nome');

      return $this->renderText(json_encode($result));
    } else {
      $result = ModeloDefeitoTable::getInstance()
        ->findModeloDefeitoByName($request['q'])
        ->toKeyValueArray('id', 'nome');

      return $this->renderText(json_encode($result));
    }
  }

  public function executeIndex(sfWebRequest $request)
  {
    if($this->getUser()->hasGroup('Clientes')) {
      $cliente = ClienteTable::getInstance()->findOneByUserId($this->getUser()->getGuardUser()->getId());
      $this->getUser()->setAttribute('ordem_servico.filters', array('cliente_id' => $cliente->getId()), 'admin_module');
      $this->getUser()->setAttribute('cliente', Doctrine::getTable('Cliente')->find(array($cliente->getId())));
		}

    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  public function executeNew(sfWebRequest $request)
  {
    if($this->getUser()->hasGroup('Clientes')) {
			$this->getUser()->setFlash('error', 'Você não tem permissão para realizar essa ação.');
			$this->redirect('ordem_servico/index');
		}

    $this->form = $this->configuration->getForm();

    if($this->getUser()->hasAttribute('cliente')) {
      $cliente = $this->getUser()->getAttribute('cliente');

      $ordemServico = new OrdemServico();
      $ordemServico->setCliente($cliente);
      $ordemServico->setUsuarioCadastro($this->getUser()->getGuardUser());

      $this->form = new OrdemServicoForm($ordemServico);
    }

    $this->ordem_servico = $this->form->getObject();
  }

  public function executeEdit(sfWebRequest $request)
  {
    if($this->getUser()->hasGroup('Clientes')) {
			$this->getUser()->setFlash('error', 'Você não tem permissão para realizar essa ação.');
			$this->redirect('ordem_servico/index');
		}

    $this->ordem_servico = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->ordem_servico);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $ordem_servico = $form->save();
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $ordem_servico)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@ordem_servico_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        if($request->getParameter('returnAction')) {
          $this->redirect($request->getParameter('returnAction'));
        }

        $this->redirect(array('sf_route' => 'ordem_servico_edit', 'sf_subject' => $ordem_servico));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

  public function executeListShow(sfWebRequest $request)
	{
		$this->ordem_servico = OrdemServicoTable::getInstance()->find($request->getParameter('id'));

    if($this->getUser()->hasGroup('Clientes')) {
      $cliente = ClienteTable::getInstance()->findOneByUserId($this->getUser()->getGuardUser()->getId());
      if($this->ordem_servico->getClienteId() != $cliente->getId()) {
        $this->getUser()->setFlash('error', 'Você não tem permissão para realizar essa ação.');
  			$this->redirect('ordem_servico/index');
      }
    }
	}

  public function executePrint(sfWebRequest $request) {
    $this->setLayout(false);

    if($request->getParameter('type') == 'garantia') {
      $this->setTemplate('printGarantia');
    } else if($request->getParameter('type') == 'os') {
      $this->setTemplate('printOS');
    } else {
      $this->setTemplate('printRecibo');
    }

    $this->ordem_servico = $this->getRoute()->getObject();
  }

  public function executeCloseOS(sfWebRequest $request) {
    $this->setLayout(false);
    $this->setTemplate(false);

    $ordem_servico = $this->getRoute()->getObject();

    $ordem_servico->setStatus('Entregue');
    $ordem_servico->save();

    return $this->renderText(json_encode('{status: OK}'));
  }

  public function executeExport(sfWebRequest $request)
  {
      $this->setLayout(false);

      $table          = Doctrine_Core::getTable('OrdemServico');
      $data           = array();

			$registers = $this->buildQuery()->execute(array(), Doctrine::HYDRATE_NONE);

      foreach($registers as $i => $r)
      {
          $data[] = array("id"=>$r[0], "created_at"=>$r[18], "updated_at"=>$r[19], "valor"=>$r[14], "status"=>$r[16]);
      }

      return $this->renderText(json_encode($data));
  }
}
