<?php

/**
 * ordem_servico module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage ordem_servico
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseOrdem_servicoGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array(  '_save' =>   array(    'label' => 'Salvar',  ),  '_list' =>   array(    'label' => 'Voltar',  ),);
  }

  public function getListObjectActions()
  {
    return array(  'show' =>   array(    'label' => 'Ver',  ),  '_edit' =>   array(    'label' => 'Editar',  ),);
  }

  public function getListActions()
  {
    return array(  '_new' =>   array(    'label' => 'Novo',  ),);
  }

  public function getListBatchActions()
  {
    return array();
  }

  public function getListParams()
  {
    return '%%id%% - %%created_at%% - %%valor%% - %%status%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Ordens de Serviço';
  }

  public function getEditTitle()
  {
    return 'Editando OS';
  }

  public function getNewTitle()
  {
    return 'Adicionar OS';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'modelo_defeito_id',  1 => 'cliente_id',  2 => 'pagamento',  3 => 'pago',  4 => 'troca',  5 => 'recorrente',  6 => 'testado',  7 => 'imei',  8 => 'data_retirada',  9 => 'status',);
  }

  public function getFormDisplay()
  {
    return array(  0 => 'modelo_defeito_id',  1 => 'cliente_id',  2 => 'comentario',  3 => 'pagamento',  4 => 'valor',  5 => 'preco_dinheiro',  6 => 'preco_cartao',  7 => 'pago',  8 => 'troca',  9 => 'recorrente',  10 => 'testado',  11 => 'imei',  12 => 'senha',  13 => 'garantia',  14 => 'data_retirada',  15 => 'status',);
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'id',  1 => 'created_at',  2 => 'valor',  3 => 'status',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'modelo_defeito_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'cliente_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'usuario_cadastro_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'comentario' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'pagamento' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Enum',),
      'pago' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Pgto Efetuado',),
      'troca' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Troca de Peça',),
      'recorrente' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'É Recorrente',),
      'testado' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Aparelho Testado?',),
      'imei' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'IMEI',),
      'senha' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'garantia' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'valor' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'status' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Enum',),
      'data_retirada' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',  'label' => 'Data de Criação',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'modelo_defeito_id' => array(),
      'cliente_id' => array(),
      'usuario_cadastro_id' => array(),
      'comentario' => array(),
      'pagamento' => array(),
      'pago' => array(),
      'troca' => array(),
      'recorrente' => array(),
      'testado' => array(),
      'imei' => array(),
      'senha' => array(),
      'garantia' => array(),
      'valor' => array(),
      'status' => array(),
      'data_retirada' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'modelo_defeito_id' => array(),
      'cliente_id' => array(),
      'usuario_cadastro_id' => array(),
      'comentario' => array(),
      'pagamento' => array(),
      'pago' => array(),
      'troca' => array(),
      'recorrente' => array(),
      'testado' => array(),
      'imei' => array(),
      'senha' => array(),
      'garantia' => array(),
      'valor' => array(),
      'status' => array(),
      'data_retirada' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'modelo_defeito_id' => array(),
      'cliente_id' => array(),
      'usuario_cadastro_id' => array(),
      'comentario' => array(),
      'pagamento' => array(),
      'pago' => array(),
      'troca' => array(),
      'recorrente' => array(),
      'testado' => array(),
      'imei' => array(),
      'senha' => array(),
      'garantia' => array(),
      'valor' => array(),
      'status' => array(),
      'data_retirada' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'modelo_defeito_id' => array(),
      'cliente_id' => array(),
      'usuario_cadastro_id' => array(),
      'comentario' => array(),
      'pagamento' => array(),
      'pago' => array(),
      'troca' => array(),
      'recorrente' => array(),
      'testado' => array(),
      'imei' => array(),
      'senha' => array(),
      'garantia' => array(),
      'valor' => array(),
      'status' => array(),
      'data_retirada' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'modelo_defeito_id' => array(),
      'cliente_id' => array(),
      'usuario_cadastro_id' => array(),
      'comentario' => array(),
      'pagamento' => array(),
      'pago' => array(),
      'troca' => array(),
      'recorrente' => array(),
      'testado' => array(),
      'imei' => array(),
      'senha' => array(),
      'garantia' => array(),
      'valor' => array(),
      'status' => array(),
      'data_retirada' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'OrdemServicoForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'OrdemServicoFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
