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
    return array(  '_new' =>   array(    'label' => 'Nova',  ),);
  }

  public function getListBatchActions()
  {
    return array();
  }

  public function getListParams()
  {
    return '%%id%% - %%created_at%% - %%updated_at%% - %%valor%% - %%status%%';
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
    return array(  0 => 'modelo_id',  1 => 'cliente_id',  2 => 'pagamento',  3 => 'testado',  4 => 'imei',  5 => 'data_retirada',  6 => 'status',);
  }

  public function getFormDisplay()
  {
    return array(  0 => 'modelo_id',  1 => 'pecas_list',  2 => 'defeito',  3 => 'cliente_id',  4 => 'comentario',  5 => 'pagamento',  6 => 'valor',  7 => 'preco_dinheiro',  8 => 'preco_cartao',  9 => 'testado',  10 => 'imei',  11 => 'com_senha',  12 => 'senha',  13 => 'garantia',  14 => 'data_retirada',  15 => 'status',  16 => 'mensagem_impressao',);
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
    return array(  0 => 'id',  1 => 'created_at',  2 => 'updated_at',  3 => 'valor',  4 => 'status',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'modelo_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'cliente_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'usuario_cadastro_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'defeito' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'comentario' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'pagamento' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Enum',),
      'testado' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Aparelho Testado?',),
      'imei' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'IMEI',),
      'com_senha' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Senha?',),
      'senha' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'garantia' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'valor' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'mensagem_impressao' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Mensagem na impressão',),
      'status' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Enum',),
      'data_retirada' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',  'label' => 'Data de Criação',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',  'label' => 'Data de Modificação',),
      'pecas_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Peças',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'modelo_id' => array(),
      'cliente_id' => array(),
      'usuario_cadastro_id' => array(),
      'defeito' => array(),
      'comentario' => array(),
      'pagamento' => array(),
      'testado' => array(),
      'imei' => array(),
      'com_senha' => array(),
      'senha' => array(),
      'garantia' => array(),
      'valor' => array(),
      'mensagem_impressao' => array(),
      'status' => array(),
      'data_retirada' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'pecas_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'modelo_id' => array(),
      'cliente_id' => array(),
      'usuario_cadastro_id' => array(),
      'defeito' => array(),
      'comentario' => array(),
      'pagamento' => array(),
      'testado' => array(),
      'imei' => array(),
      'com_senha' => array(),
      'senha' => array(),
      'garantia' => array(),
      'valor' => array(),
      'mensagem_impressao' => array(),
      'status' => array(),
      'data_retirada' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'pecas_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'modelo_id' => array(),
      'cliente_id' => array(),
      'usuario_cadastro_id' => array(),
      'defeito' => array(),
      'comentario' => array(),
      'pagamento' => array(),
      'testado' => array(),
      'imei' => array(),
      'com_senha' => array(),
      'senha' => array(),
      'garantia' => array(),
      'valor' => array(),
      'mensagem_impressao' => array(),
      'status' => array(),
      'data_retirada' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'pecas_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'modelo_id' => array(),
      'cliente_id' => array(),
      'usuario_cadastro_id' => array(),
      'defeito' => array(),
      'comentario' => array(),
      'pagamento' => array(),
      'testado' => array(),
      'imei' => array(),
      'com_senha' => array(),
      'senha' => array(),
      'garantia' => array(),
      'valor' => array(),
      'mensagem_impressao' => array(),
      'status' => array(),
      'data_retirada' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'pecas_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'modelo_id' => array(),
      'cliente_id' => array(),
      'usuario_cadastro_id' => array(),
      'defeito' => array(),
      'comentario' => array(),
      'pagamento' => array(),
      'testado' => array(),
      'imei' => array(),
      'com_senha' => array(),
      'senha' => array(),
      'garantia' => array(),
      'valor' => array(),
      'mensagem_impressao' => array(),
      'status' => array(),
      'data_retirada' => array(),
      'created_at' => array(),
      'updated_at' => array(),
      'pecas_list' => array(),
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
