<?php


class PRClienteTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PRCliente');
    }
    
     public function getConFacturas()
    {
      $q = $this->createQuery('e')
        ->leftJoin('e.PRProyecto p')
        ->leftJoin('p.PRFactura f');
      return $q->execute();
    }
}
