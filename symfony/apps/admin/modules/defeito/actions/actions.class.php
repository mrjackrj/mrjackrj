<?php

require_once dirname(__FILE__).'/../lib/defeitoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/defeitoGeneratorHelper.class.php';

/**
 * defeito actions.
 *
 * @package    mrjackrj
 * @subpackage defeito
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defeitoActions extends autoDefeitoActions
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
