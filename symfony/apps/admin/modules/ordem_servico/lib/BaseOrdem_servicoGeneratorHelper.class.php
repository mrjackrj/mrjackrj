<?php

/**
 * ordem_servico module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage ordem_servico
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseOrdem_servicoGeneratorHelper extends sfModelGeneratorBootstrapHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'ordem_servico' : 'ordem_servico_'.$action;
  }
}
