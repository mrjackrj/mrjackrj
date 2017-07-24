<?php

class ClientFormSignin extends BaseForm
{
  public function configure()
  {
    $this->widgetSchema['cpf']        = new sfWidgetFormInputText();
    $this->validatorSchema['cpf']     = new sfValidatorString(array('max_length' => 30, 'required' => true));

    $this->widgetSchema->setNameFormat('signin[%s]');
  }
}
