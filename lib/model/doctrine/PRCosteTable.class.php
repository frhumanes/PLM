<?php


class PRCosteTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PRCoste');
    }
    
    public function getCostesQuery(Doctrine_Query $q = null)
    {
      return $q->execute();
    }
}
