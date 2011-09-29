<?php


class TEstadoTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TEstado');
    }

    public function getConOfertas()
    {
      $q = $this->createQuery('c')
        ->leftJoin('c.PROferta o');
      return $q->execute();
    }

}
