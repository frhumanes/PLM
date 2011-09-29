<?php


class PRHistoricoTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PRHistorico');
    }
    
    public function getMeses()
    {
      $q = Doctrine_Query::create()
          ->select('MONTH(h.created_at) as month, YEAR(h.created_at) as year')
          ->from('PRHistorico h')
          ->groupBy('month, year');
      return $q->execute();
    }
}
