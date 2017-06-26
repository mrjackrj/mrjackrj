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

    $this->widgetSchema['preco_dinheiro'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['preco_cartao'] = new sfWidgetFormInputHidden();

    $this->validatorSchema['preco_dinheiro'] = new sfValidatorPass();
    $this->validatorSchema['preco_cartao'] = new sfValidatorPass();
  }
}
