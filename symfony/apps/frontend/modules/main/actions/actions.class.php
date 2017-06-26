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

          $email = $clienteRequest['email'];
          $cpf   = $clienteRequest['cpf'];

          if(ClienteTable::getInstance()->findOneByEmail($email) != null) {
            return $this->renderText('Já existe outro cliente cadastrado com esse email.');
          }

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
}
