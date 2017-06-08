  // Sorting custom column
  // http://sakrawebstudio.blogspot.com/2011/01/sort-by-foreign-key-or-custom-column-in.html
  // http://stereointeractive.com/blog/2011/01/08/symfony-1-4-admin-generator-sort-on-custom-column/
  // http://forum.symfony-project.org/viewtopic.php?t=26496

  protected function addSortQuery($query)
  {
    $rootAlias = $query->getRootAlias();
    if (array(null, null) == ($sort = $this->getSort()))
    {
      return;
    }
    $s = $sort[0];
    $fields = $this->varHolder->get('configuration')->getFieldsDefault();
    if ($fields != null)
    {
      $field = $fields[$s];
      if ($field != null)
      {
        if (isset($field['sortBy']))
        {
          $criterion = $field['sortBy'];
          if ($criterion != null)
          {
            $s = $criterion;
          }
        }
      }
    }

    if (isset($field['noRootAlias']) && $field['noRootAlias'] == true)
    {
      $query->addOrderBy($s . ' ' . $sort[1]);
    }
    else
    {
      $query->addOrderBy($rootAlias.'.'.$s . ' ' . $sort[1]);
    }
  }

  protected function getSort()
  {
    if (null !== $sort = $this->getUser()->getAttribute('<?php echo $this->getModuleName() ?>.sort', null, 'admin_module'))
    {
      return $sort;
    }

    $this->setSort($this->configuration->getDefaultSort());

    return $this->getUser()->getAttribute('<?php echo $this->getModuleName() ?>.sort', null, 'admin_module');
  }

  protected function setSort(array $sort)
  {
    if (null !== $sort[0] && null === $sort[1])
    {
      $sort[1] = 'asc';
    }

    $this->getUser()->setAttribute('<?php echo $this->getModuleName() ?>.sort', $sort, 'admin_module');
  }

  protected function isValidSortColumn($column)
  {
    return array_key_exists($column, $this->varHolder->get('configuration')->getFieldsDefault());
    return Doctrine_Core::getTable('<?php echo $this->getModelClass() ?>')->hasColumn($column);
  }

  /**
   * Exportar lista do admin
   *
   * Gera um csv baseado na query executada pelo admin para retornar a lista.
   * Funciona inclusive quando a lista é filtrada
   *
   * @author Eduardo Marcolino <eduardo.marcolino@gmail.com>
   */

    public function executeCsv(sfWebRequest $request)
    {
        $this->setLayout(false);
        
        $table          = Doctrine_Core::getTable('<?php echo $this->getModelClass() ?>');
        $data           = array();
        $fieldsDefault  = $this->configuration->getFieldsDefault();

        $objPHPExcel = new sfPhpExcel();

        foreach( array_keys($this->configuration->getValue('list.display')) as $key )
        {
          if(array_key_exists($key,$fieldsDefault))
          {
            if(array_key_exists('label',$fieldsDefault[$key])) {
              $data[0][] = $fieldsDefault[$key]['label'];
            } else {
              $data[0][] = ucfirst($key);
            }
          } else {
            $data[0][] = ucfirst($key);
          }
        }
        
        $registers = $this->buildQuery()->execute();
        foreach($registers as $i => $r)
        {
            $values = array();

            foreach ($this->configuration->getValue('list.display') as $name => $field)
            {
              if($field->isPartial()) {
                $data[$i+1][] = $this->getPartial($name,array('<?php echo $this->getSingularName() ?>' => $r, 'textonly' => true));
              } else {
                try {
                  $retorno = call_user_func(array($r, 'get'.  ucfirst($name)));
                  $data[$i+1][] = sprintf('%s',$retorno);
                  //$data[$i+1][] = call_user_func(array($r, 'get'.  ucfirst($name)));
                }catch(Exception $e) {
                  $data[$i+1][] = 'bug';
                }
              }
            }
        }
        
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->fromArray($data);
        
        foreach(range('a','z') as $i) {
          $objPHPExcel->getActiveSheet()->getColumnDimension(strtoupper($i))->setAutoSize(true);
        }


        $this->getResponse()->clearHttpHeaders();
        $this->getResponse()->setHttpHeader('Content-Type', 'application/vnd.ms-excel');
        $this->getResponse()->setHttpHeader('Content-Disposition', 'attachment; filename=<?php echo $this->getSingularName() ?>.xls');
        $this->getResponse()->setHttpHeader('Content-Transfer-Encoding', 'binary');

        $pFilename = tempnam('./', 'phpxl');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save($pFilename);

        $this->getResponse()->setContent(file_get_contents($pFilename));
        unlink($pFilename);

        return sfView::NONE;
    }
