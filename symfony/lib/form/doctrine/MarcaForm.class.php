<?php

/**
 * Marca form.
 *
 * @package    mrjackrj
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MarcaForm extends BaseMarcaForm
{
  public function configure()
  {
    $this->widgetSchema['imagem'] = new sfWidgetFormInputFileEditable(array(
        'file_src'  => '/uploads/marca/'.$this->getObject()->getImagem(),
        'edit_mode' => strlen($this->getObject()->getImagem()),
        'with_delete' => true,
        'delete_label' => 'Excluir Imagem',
        'template'  => '
          <div>
            %input%<br /><br /><br />
            <strong>Imagem atual:</strong><br />
            <img src="%file%" /><br />
            <div style="float:left;">%delete%</div>
            <div style="float:left;">%delete_label%</div>
          </div>
        ',
    ));

  	$this->validatorSchema['imagem'] = new sfValidatorFile(array(
      'required'      => false,
      'path'          => sfConfig::get('sf_upload_dir') . '/marca/'
    ));

    $this->validatorSchema['imagem_delete'] = new sfValidatorPass();
  }

  protected function doSave($con = null)
  {
    $save = parent::doSave($con);

    $image = $this->getValue('imagem');

    if($image) {
      $thumbnail = new sfThumbnail(500, 375, false);
        $thumbnail->loadFile(sfConfig::get('sf_upload_dir').'/marca/'.$this->getObject()->getImagem());
        $thumbnail->save(sfConfig::get('sf_upload_dir').'/marca/'.$this->getObject()->getImagem(), $image->getType());
    }

    return $save;
  }
}
