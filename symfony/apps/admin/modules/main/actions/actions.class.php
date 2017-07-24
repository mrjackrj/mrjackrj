<?php

/**
 * main actions.
 *
 * @package    revista
 * @subpackage main
 * @author     lsouza
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions
{
  public function executeLogin(sfWebRequest $request)
  {
    $this->setLayout('login');

    $user = $this->getUser();
    if ($user->isAuthenticated())
    {
      return $this->redirect('@homepage');
    }

    $this->loginType = $request->getParameter('loginType');
    if(count($this->loginType)) {
      $this->form = new ClientFormSignin();

      if ($request->isMethod('post'))
      {
        $this->form->bind($request->getParameter('signin'));

        if ($this->form->isValid())
        {
          $values = $this->form->getValues();
          $usuario = ClienteTable::getInstance()->findOneByCpf($values['cpf']);

          if($usuario == null) {
            $user->setFlash('error', 'CPF inválido');
            return;
          }

          $this->getUser()->signin($usuario->getUser());

          return $this->redirect('@ordem_servico');
        } else {
          $user->setFlash('error', 'CPF inválido');
        }
      }

    } else {
      $this->form = new sfGuardFormSignin();

      if ($request->isMethod('post'))
      {
        $this->form->bind($request->getParameter('signin'));
        if ($this->form->isValid())
        {
          $values = $this->form->getValues();
          $this->getUser()->signin($values['user']);

          return $this->redirect('@homepage');
        } else {
          $user->setFlash('error', 'Login ou senha inválidos');
        }
      }
    }
  }

	public function executeIndex(sfWebRequest $request) {
    if($this->getUser()->hasGroup('Clientes')) {
      return $this->redirect('@ordem_servico');
    }
	}
}
