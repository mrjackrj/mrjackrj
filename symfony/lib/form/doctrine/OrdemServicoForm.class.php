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
    ), array('style'=>'list-style:none;display:inline;padding:5px;margin:0px;'));

    $this->widgetSchema['cliente_id'] = new sfWidgetFormDoctrineJQueryAutocompleter(array(
      'url' => '/admin.php/autocomplete?type=cliente',
      'model' => 'Cliente',
      'value_callback' => 'findOneById'
    ));

    $this->widgetSchema['modelo_id'] = new sfWidgetFormDoctrineJQueryAutocompleter(array(
      'url' => '/admin.php/autocomplete?type=modelo',
      'model' => 'Modelo',
      'value_callback' => 'findOneById'
    ));

    $this->widgetSchema['testado'] = new sfWidgetFormChoice(array(
      'choices' => array('1' => 'Sim', '0' => 'Não'),
      'expanded'=>true
    ), array('style'=>'list-style:none;display:inline;padding:5px;margin:0px;'));

    $this->widgetSchema['data_retirada'] = new sfWidgetFormInputText(array(), array('class'=>'datetimepicker'));
    $this->widgetSchema['senha'] = new sfWidgetFormInputText(array(), array('style'=>'display:none'));
    $this->widgetSchema->setLabels(array(
			'senha' => ' ',
		));
    $this->widgetSchema['usuario_cadastro_id'] = new sfWidgetFormInputHidden();
    if($this->isNew()) {
      $this->widgetSchema['usuario_cadastro_id'] = new sfWidgetFormInputHidden(array(), array('value'=>sfContext::getInstance()->getUser()->getGuardUser()->getId()));
    }
    $this->widgetSchema['preco_dinheiro'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['preco_cartao'] = new sfWidgetFormInputHidden();

    $this->validatorSchema['preco_dinheiro'] = new sfValidatorPass();
    $this->validatorSchema['preco_cartao'] = new sfValidatorPass();

    if($this->isNew()) {
      $this->embedForm('lista_checagem', new OrdemServicoListaChecagemForm());
    } else {
      $this->widgetSchema['pecas_list'] = new sfWidgetFormDoctrineChoiceWithParams(array(
        'multiple' => true, 'model' => 'Peca', 'table_method' => array('method' => 'getPecasByModelo', 'parameters' => array($this->getObject()->getModeloId()))
      ));

      $preco_dinheiro = 0;
      $preco_cartao = 0;
      $osPecas = OrdemServicoPecaTable::getInstance()->findByOrdemServicoId($this->getObject()->getId());

      foreach ($osPecas as $key => $osPeca) {
        $modelo_peca    = ModeloPecaTable::getInstance()->findOneByModeloIdAndPecaId($this->getObject()->getModeloId(), $osPeca->getPeca()->getId());

        if($modelo_peca != null) {
          $preco_dinheiro += preg_replace("/\,/", ".", preg_replace("/\./", "", $modelo_peca->getPrecoDinheiro()));
          $preco_cartao   += preg_replace("/\,/", ".", preg_replace("/\./", "", $modelo_peca->getPrecoCartao()));
        }
      }

      $this->widgetSchema['preco_dinheiro'] = new sfWidgetFormInputHidden(array(), array('value'=>$preco_dinheiro));
      $this->widgetSchema['preco_cartao'] = new sfWidgetFormInputHidden(array(), array('value'=>$preco_cartao));

      $lista_checagem = OrdemServicoListaChecagemTable::getInstance()->findOneByOrdemServicoId($this->getObject()->getId());

      if($lista_checagem == null) {
        $lista_checagem = new OrdemServicoListaChecagem();
      }

      $lista_checagem->setOrdemServicoId($this->getObject()->getId());
      $this->embedForm('lista_checagem', new OrdemServicoListaChecagemForm($lista_checagem));
    }
  }

  protected function doSave($con = null)
	{
    $save = parent::doSave($con);

    $embeddedObj = $this->getEmbeddedForm('lista_checagem')->getObject();
    $embeddedObj->setOrdemServicoId($this->getObject()->getId());
    $embeddedObj->save();

    return $save;
	}
}
