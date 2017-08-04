<?php

require_once dirname(__FILE__).'/../lib/modelo_pecaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/modelo_pecaGeneratorHelper.class.php';

/**
 * modelo_peca actions.
 *
 * @package    mrjackrj
 * @subpackage modelo_peca
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class modelo_pecaActions extends autoModelo_pecaActions
{
  const SUCCESS 			= 200;

  public function execute($request)
  {
		if(!$this->getUser()->hasGroup('Administradores')) {
			$this->getUser()->setFlash('error', 'Você não tem permissão para realizar essa ação.');
			$this->redirect('main/index');
		}

		return parent::execute($request);
  }

  public function executeIndex(sfWebRequest $request)
  {
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

    if($request->isXmlHttpRequest()) {
      $modeloId    = $request->getParameter('modelo_id');
      $pecas       = explode(",", $request->getParameter('pecas'));
      $modeloPecas = ModeloPecaTable::getInstance()->findByModeloIdAndPecas($modeloId, $pecas);
      $pecas       = array();

      foreach ($modeloPecas as $key => $modeloPeca) {
        $pecas[] = $modeloPeca->asJson();
      }

      return $this->renderText(json_encode('{"pecas":['.implode(",", $pecas).']}'));
    }
  }
}
