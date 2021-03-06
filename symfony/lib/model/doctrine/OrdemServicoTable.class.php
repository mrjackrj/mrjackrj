<?php

/**
 * OrdemServicoTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class OrdemServicoTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object OrdemServicoTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('OrdemServico');
    }

    public function findByModeloIds($modeloIds) {

      return Doctrine_Query::create()
			   ->from('OrdemServico os')
         ->whereIn("os.modelo_id", $modeloIds)
         ->execute();
    }
}
