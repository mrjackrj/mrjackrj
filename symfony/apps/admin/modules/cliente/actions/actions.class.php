<?php

require_once dirname(__FILE__).'/../lib/clienteGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/clienteGeneratorHelper.class.php';
require_once(dirname(__FILE__).'/../../ordem_servico/lib/BaseOrdem_servicoGeneratorConfiguration.class.php');
require_once(dirname(__FILE__).'/../../ordem_servico/lib/BaseOrdem_servicoGeneratorHelper.class.php');
require_once dirname(__FILE__).'/../../ordem_servico/lib/ordem_servicoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../../ordem_servico/lib/ordem_servicoGeneratorHelper.class.php';

/**
 * cliente actions.
 *
 * @package    mrjackrj
 * @subpackage cliente
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clienteActions extends autoClienteActions
{
  public function executeOrdemServico(sfWebRequest $request)
	{
    $this->getUser()->setAttribute('ordem_servico.page', 1, 'admin_module');
    $this->getUser()->setAttribute('ordem_servico.filters', array('cliente_id' => $this->getRequestParameter('id')), 'admin_module');
    $this->getUser()->setAttribute('cliente', Doctrine::getTable('Cliente')->find(array($this->getRequestParameter('id'))));

    $this->redirect($this->generateUrl('ordem_servico'));
	}

  public function executeEdit(sfWebRequest $request)
  {
    $html = $this->getController()->getPresentationFor('cliente', 'index');
    $this->cliente = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->cliente);

    $this->osConfiguration = new ordem_servicoGeneratorConfiguration();
    $this->osHelper = new ordem_servicoGeneratorHelper();

    $this->ordens_servico = OrdemServicoTable::getInstance()->findByClienteId($this->cliente->getId());
    $this->ordem_servico = new OrdemServico();
    $this->ordem_servico->setCliente($this->cliente);
    $this->ordem_servico->setUsuarioCadastro($this->getUser()->getGuardUser());

    $this->osForm = new OrdemServicoForm($this->ordem_servico);
    $this->osPager = $this->getOSPager();
    $this->osSort = null;
  }

  protected function getOSPager()
  {
    $pager = $this->configuration->getPager('OrdemServico');
    $pager->setQuery(Doctrine_Query::create()->from('OrdemServico os')->where("os.cliente_id = ?", $this->cliente->getId()));
    $pager->setPage(1);
    $pager->init();

    return $pager;
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $clienteRequest = $request->getParameter('cliente');
        $cpf   = $clienteRequest['cpf'];

        if($form->getObject()->isNew() && ClienteTable::getInstance()->findOneByCpf($cpf) != null) {
          $this->getUser()->setFlash('error', 'Já existe outro cliente cadastrado com esse CPF.');
          return sfView::SUCCESS;
        }

        $cliente = $form->save();
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

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $cliente)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@cliente_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'cliente_edit', 'sf_subject' => $cliente));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

  public function executeExport(sfWebRequest $request)
  {
      $this->setLayout(false);

      $table          = Doctrine_Core::getTable('Cliente');
      $data           = array();

			$registers = $this->buildQuery()->execute(array(), Doctrine::HYDRATE_NONE);

      foreach($registers as $i => $r)
      {
          $data[] = array(
            "nome"=>$r[1],
            "email"=>$r[2],
            "cpf"=>$r[3],
            "telefone"=>$r[4],
            "endereco"=>$r[4],
            "cidade"=>$r[6],
            "estado"=>$r[7],
            "observacoes"=>$r[8],
            "created_at"=>$r[10]);
      }

      return $this->renderText(json_encode($data));
  }
}
