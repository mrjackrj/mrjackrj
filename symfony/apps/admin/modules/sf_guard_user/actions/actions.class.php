<?php

require_once dirname(__FILE__).'/../lib/sf_guard_userGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sf_guard_userGeneratorHelper.class.php';

/**
 * sf_guard_user actions.
 *
 * @package    revista
 * @subpackage sf_guard_user
 * @author     lsouza
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sf_guard_userActions extends autoSf_guard_userActions
{
  public function execute($request)
  {
		if(!$this->getUser()->hasGroup('Administradores') && !in_array(sfContext::getInstance()->getActionName(), array('edit', 'update'))) {
			$this->getUser()->setFlash('error', 'Você não tem permissão para realizar essa ação.');
			$this->redirect('main/index');
		}

		return parent::execute($request);
  }

  protected function buildQuery()
  {
    $tableMethod = $this->configuration->getTableMethod();
    if (null === $this->filters)
    {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }

    $this->filters->setTableMethod($tableMethod);

    $query = $this->filters->buildQuery($this->getFilters());

    $this->addSortQuery($query);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = $event->getReturnValue();

    return $query->innerJoin('r.Groups g')->andWhere('g.id != ?', 3);
  }
}
