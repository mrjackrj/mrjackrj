<?php

require_once dirname(__FILE__).'/../lib/marcaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/marcaGeneratorHelper.class.php';

/**
 * marca actions.
 *
 * @package    mrjackrj
 * @subpackage marca
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class marcaActions extends autoMarcaActions
{
  public function execute($request)
  {
		if(!$this->getUser()->hasGroup('Administradores')) {
			$this->getUser()->setFlash('error', 'Você não tem permissão para realizar essa ação.');
			$this->redirect('main/index');
		}

		return parent::execute($request);
  }
}
