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
  public function executeDefeitos(sfWebRequest $request)
	{
    $this->getUser()->setAttribute('modelo_defeito.page', 1, 'admin_module');

    $this->getUser()->setAttribute('modelo', Doctrine::getTable('Modelo')->find(array($this->getRequestParameter('id'))));

    $this->redirect($this->generateUrl('modelo_defeito'));
	}
}
