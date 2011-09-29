<?php


class TEstadoFacturaTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TEstadoFactura');
    }
    
    public function getConFacturas()
    {
      $q = $this->createQuery('e')
        ->leftJoin('e.PRFactura f');
      return $q->execute();
    }

}
