<?php

require_once dirname(__FILE__).'/../lib/modeloGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/modeloGeneratorHelper.class.php';

/**
 * modelo actions.
 *
 * @package    mrjackrj
 * @subpackage modelo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class modeloActions extends autoModeloActions
{
  public function execute($request)
  {
		if(!$this->getUser()->hasGroup('Administradores')) {
			$this->getUser()->setFlash('error', 'Você não tem permissão para realizar essa ação.');
			$this->redirect('main/index');
		}

		return parent::execute($request);
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->modelo = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->modelo);

    if($request->isXmlHttpRequest()) {
      return $this->renderText(json_encode($this->modelo->asJson()));
    }
  }

  public function executePecas(sfWebRequest $request)
	{
    $this->getUser()->setAttribute('modelo_peca.page', 1, 'admin_module');
    $this->getUser()->setAttribute('modelo_peca.filters', array('modelo_id' => $this->getRequestParameter('id')), 'admin_module');
    $this->getUser()->setAttribute('modelo', Doctrine::getTable('Modelo')->find(array($this->getRequestParameter('id'))));

    $this->redirect($this->generateUrl('modelo_peca'));
	}

  public function executeExport(sfWebRequest $request)
  {
      $this->setLayout(false);

      $table          = Doctrine_Core::getTable('Modelo');
      $data           = array();

			$registers = $this->buildQuery()->execute(array(), Doctrine::HYDRATE_NONE);

      foreach($registers as $i => $r)
      {
          $data[] = array("nome"=>$r[1], "marca"=>$r[2], "created_at"=>$r[5]);
      }

      return $this->renderText(json_encode($data));
  }
}
