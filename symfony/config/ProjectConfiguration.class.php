<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    sfConfig::set('sf_web_dir', dirname(__FILE__).'/../../www');
    sfConfig::set('sf_upload_dir', sfConfig::get('sf_web_dir').'/uploads');

    $this->enablePlugins(array(
    	'sfDoctrinePlugin',
    	'sfDoctrineGuardPlugin',
      'sfFormExtraPlugin',
      'sfThumbnailPlugin',
      'sfPhpExcelPlugin'
    ));
  }
}
