<?php

/**
 * OrdemServico filter form.
 *
 * @package    mrjackrj
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OrdemServicoFormFilter extends BaseOrdemServicoFormFilter
{
  public function configure()
  {
    $this->widgetSchema['cliente_id'] = new sfWidgetFormDoctrineJQueryAutocompleter(array(
      'url' => '/admin.php/autocomplete',
      'model' => 'Cliente',
      'value_callback' => 'findOneById'
    ));
  }
}
