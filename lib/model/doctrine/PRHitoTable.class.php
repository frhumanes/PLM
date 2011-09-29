<?php


class PRHitoTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PRHito');
    }
    
    public function getHitosQuery(Doctrine_Query $q = null)
    {
      return $q->execute();
    }
}
