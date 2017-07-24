<?php

/**
 * aparelhos actions.
 *
 * @package    mrjackrj
 * @subpackage aparelhos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class aparelhosActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $marca            = MarcaTable::getInstance()->findOneBySlug($request->getParameter('marca'));
    $this->aparelhos  = ModeloTable::getInstance()->findByMarcaIdAndMostrarSite($marca->getId(), 1);
  }
}
