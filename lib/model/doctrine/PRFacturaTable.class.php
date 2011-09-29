<?php


class PRFacturaTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PRFactura');
    }
    
    
    public function getTodas()
    {
      $q = Doctrine_Query::create()
          ->from('PRFactura f')
          ->leftJoin('f.PRHistorico h')
          ->orderBy('h.created_at DESC');
      return $q->execute();
    }
    
     public function addFacturasQuery(Doctrine_Query $q = null)
    {
      if (is_null($q))
      {
        $q = Doctrine_Query::create()
          ->from('PRFactura o')
          ->orderBy('o.created_at DESC');
      }
      return $q;
    }

    public function retrieveFactura(Doctrine_Query $q)
    {
      return $this->addFacturasQuery($q)->fetchOne();
    }
    public function getFacturas(Doctrine_Query $q = null)
    {
      return $this->addFacturasQuery($q)->execute();
    }

    public function countFacturas(Doctrine_Query $q = null)
    {
         return $this->addFacturasQuery($q)->count();
    }
      
    public function sumFacturas(Doctrine_Query $q = null)
    {
        $q->select('SUM(f.importe) as total, t.name as estado ')
          ->from('PRFactura f')
          ->leftJoin('f.TEstadoFactura t')
          ->groupBy('t.name');
        return $this->addFacturasQuery($q)->execute();
    }
      
      
     static public function getLuceneIndex()
    {
      ProjectConfiguration::registerZend();
      if (file_exists($index = self::getLuceneIndexFile()))
      {
        return Zend_Search_Lucene::open($index);
      }
      return Zend_Search_Lucene::create($index);
    }
    
    static public function getLuceneIndexFile()
    {
      return sfConfig::get('sf_data_dir').'/factura.'.sfConfig::get('sf_environment').'.index';
    }

    public function getForLuceneQuery($query)
    {
      $hits = self::getLuceneIndex()->find($query);
      $pks = array();
      foreach ($hits as $hit)
      {
        $pks[] = $hit->pk;
      }
      if (empty($pks))
      {
        return array();
      }
      $q = $this->createQuery('j')
        ->whereIn('j.id', $pks)
        ->limit(20);
      return $q->execute();
    }
}
