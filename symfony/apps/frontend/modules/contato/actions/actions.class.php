<?php

/**
 * contato actions.
 *
 * @package    mrjackrj
 * @subpackage contato
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contatoActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new ContatoForm();

    if($request->getMethod() == sfRequest::POST) {
        $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));

        if ($this->form->isValid()) {

          $contato = $this->form->save();

          /*$email = $this->getPartial('contato/email', array('contato' => $contato));
          $message = Swift_Message::newInstance()
            ->setFrom(array($request->getParameter('recipient') => 'Mr. Jack'))
            ->setTo($request->getParameter('email'))
            ->setSubject($request->getParameter('subject'))
            ->setBody($email, 'text/html')
          ;*/

          return $this->renderText('Muito obrigado pela sua mensagem, em breve entraremos em contato..');
        } else {
          return $this->renderText('Falha ao enviar dados da cotação.');
        }
    }
  }
}
