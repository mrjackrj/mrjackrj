<?php

/**
 * OrdemServico form.
 *
 * @package    mrjackrj
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OrdemServicoForm extends BaseOrdemServicoForm
{
  public function configure()
  {
    $this->widgetSchema['pagamento'] = new sfWidgetFormChoice(array(
      'choices' => array('Dinheiro' => 'Dinheiro', 'Parcelado' => 'Parcelado'),
      'expanded'=>true
    ), array('style'=>'list-style:none;display:inline;padding:5px;'));

    $this->widgetSchema['cliente_id'] = new sfWidgetFormDoctrineJQueryAutocompleter(array(
      'url' => '/admin.php/autocomplete?type=cliente',
      'model' => 'Cliente',
      'value_callback' => 'findOneById'
    ));

    $this->widgetSchema['modelo_defeito_id'] = new sfWidgetFormDoctrineJQueryAutocompleter(array(
      'url' => '/admin.php/autocomplete?type=modelo_defeito',
      'model' => 'ModeloDefeito',
      'value_callback' => 'findOneById'
    ));

    $this->widgetSchema['senha'] = new sfWidgetFormInputText(array(), array('style'=>'display:none'));
    $this->widgetSchema->setLabels(array(
			'senha' => ' ',
		));
    $this->widgetSchema['usuario_cadastro_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['preco_dinheiro'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['preco_cartao'] = new sfWidgetFormInputHidden();

    $this->validatorSchema['preco_dinheiro'] = new sfValidatorPass();
    $this->validatorSchema['preco_cartao'] = new sfValidatorPass();
  }
}
