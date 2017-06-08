<?php

/**
 * Defeito form.
 *
 * @package    mrjackrj
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DefeitoForm extends BaseDefeitoForm
{
  public function configure()
  {
    $this->widgetSchema['modelo_list']->setLabel('Modelos');
  }
}
