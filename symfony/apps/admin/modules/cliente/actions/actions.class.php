<?php

require_once dirname(__FILE__).'/../lib/clienteGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/clienteGeneratorHelper.class.php';

/**
 * cliente actions.
 *
 * @package    mrjackrj
 * @subpackage cliente
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clienteActions extends autoClienteActions
{
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $clienteRequest = $request->getParameter('cliente');
        $cpf   = $clienteRequest['cpf'];

        if(ClienteTable::getInstance()->findOneByCpf($cpf) != null) {
          $this->getUser()->setFlash('error', 'Já existe outro cliente cadastrado com esse CPF.');
          return sfView::SUCCESS;
        }

        $cliente = $form->save();
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $cliente)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@cliente_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'cliente_edit', 'sf_subject' => $cliente));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
}
