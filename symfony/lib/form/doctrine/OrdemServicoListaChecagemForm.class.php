<?php

/**
 * OrdemServicoListaChecagem form.
 *
 * @package    mrjackrj
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OrdemServicoListaChecagemForm extends BaseOrdemServicoListaChecagemForm
{
  public function configure()
  {
    $this->widgetSchema['ordem_servico_id'] = new sfWidgetFormInputHidden();
  }
}
