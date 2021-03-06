<?php

/**
 * ModeloPecaTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ModeloPecaTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ModeloPecaTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ModeloPeca');
    }

    public function findByModeloIdAndPecas($modeloId, $pecas) {

      return Doctrine_Query::create()
			   ->from('ModeloPeca mp')
         ->where("mp.modelo_id = ?", $modeloId)
         ->andWhereIn("mp.peca_id", $pecas)
         ->execute();
    }
}
