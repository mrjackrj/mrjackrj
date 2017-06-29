<?php

require_once dirname(__FILE__).'/../lib/modelo_defeitoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/modelo_defeitoGeneratorHelper.class.php';

/**
 * modelo_defeito actions.
 *
 * @package    mrjackrj
 * @subpackage modelo_defeito
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class modelo_defeitoActions extends autoModelo_defeitoActions
{
  const SUCCESS 			= 200;

  public function executeEdit(sfWebRequest $request)
  {
    $this->modelo_defeito = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->modelo_defeito);

    if($request->isXmlHttpRequest()) {
      return $this->renderJson(array('code' => self::SUCCESS, 'error' => false, 'data' => $this->modelo_defeito->asJson()));
    }
  }

  public function renderJson(array $data)
	{
  	$this->getResponse()->setContentType('application/json');
  	$this->getResponse()->setContent(json_encode($data));
  	return sfView::NONE;
	}
}
