<?php

/**
 * Contato form.
 *
 * @package    mrjackrj
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContatoForm extends BaseContatoForm
{
  public function configure()
  {
    $this->disableLocalCSRFProtection();
    $this->validatorSchema['email'] = new sfValidatorAnd(array(
		  $this->validatorSchema['email'],
		  new sfValidatorEmail(),
		));
  }
}
