<?php

/**
 * main actions.
 *
 * @package    mrjackrj
 * @subpackage main
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions
{
  const SUCCESS 			= 200;

 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new ClienteForm();
  }

  public function executeCliente(sfWebRequest $request)
  {
    $this->form = new ClienteForm();

    if($request->getMethod() == sfRequest::POST) {
        $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));

        if ($this->form->isValid()) {
          $clienteRequest = $request->getParameter('cliente');

          $cpf   = $clienteRequest['cpf'];

          if(ClienteTable::getInstance()->findOneByCpf($cpf) != null) {
            return $this->renderText('Já existe outro cliente cadastrado com esse CPF.');
          }

          $cliente = $this->form->save();

          return $this->renderText('Usuário salvo com sucesso. Clique em curtir nossa página para completar o cadastro!');
        } else {
          return $this->renderText('Falha ao enviar dados da cotação.');
        }
    }
  }

  public function executeModeloDefeito(sfWebRequest $request)
  {
    $modeloId   = $request->getParameter('modelo_id');
    $defeitoId  = $request->getParameter('defeito_id');
    $this->modelo_defeito = ModeloDefeitoTable::getInstance()->findOneByModeloIdAndDefeitoId($modeloId, $defeitoId);

    return $this->renderJson(array('code' => self::SUCCESS, 'error' => false, 'data' => $this->modelo_defeito->asJson()));
  }

  public function renderJson(array $data)
	{
  	$this->getResponse()->setContentType('application/json');
  	$this->getResponse()->setContent(json_encode($data));
  	return sfView::NONE;
	}
}
