<?php

require_once dirname(__FILE__).'/../lib/contatoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/contatoGeneratorHelper.class.php';

/**
 * contato actions.
 *
 * @package    mrjackrj
 * @subpackage contato
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contatoActions extends autoContatoActions
{
  public function execute($request)
  {
		if(!$this->getUser()->hasGroup('Administradores')) {
			$this->getUser()->setFlash('error', 'Você não tem permissão para realizar essa ação.');
			$this->redirect('main/index');
		}

		return parent::execute($request);
  }

  public function executeExport(sfWebRequest $request)
  {
      $this->setLayout(false);

      $table          = Doctrine_Core::getTable('Contato');
      $data           = array();

			$registers = $this->buildQuery()->execute(array(), Doctrine::HYDRATE_NONE);

      foreach($registers as $i => $r)
      {
          $data[] = array("nome"=>$r[1], "email"=>$r[2], "assunto"=>$r[4], "created_at"=>$r[6]);
      }

      return $this->renderText(json_encode($data));
  }
}
