<?php

require_once dirname(__FILE__).'/../lib/ordem_servicoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/ordem_servicoGeneratorHelper.class.php';

/**
 * ordem_servico actions.
 *
 * @package    mrjackrj
 * @subpackage ordem_servico
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ordem_servicoActions extends autoOrdem_servicoActions
{
  public function executeAutocomplete(sfWebRequest $request)
  {
    $result = ClienteTable::getInstance()
      ->findClienteByName($request['q'])
      ->toKeyValueArray('id', 'nome');

    return $this->renderText(json_encode($result));
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();

    if($this->getUser()->hasAttribute('cliente')) {
      $cliente = $this->getUser()->getAttribute('cliente');

      $ordemServico = new OrdemServico();
      $ordemServico->setCliente($cliente);

      $this->form = new OrdemServicoForm($ordemServico);
    }

    $this->ordem_servico = $this->form->getObject();
  }
}
