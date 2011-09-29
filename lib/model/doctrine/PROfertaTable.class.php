<?php


class PROfertaTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PROferta');
    }
    
    public function addOfertasQuery(Doctrine_Query $q = null)
    {
      if (is_null($q))
      {
        $q = Doctrine_Query::create()
          ->from('PROferta o');
      }
      $alias = $q->getRootAlias();
      
      $q->addOrderBy($alias.'.fecha_creacion DESC');
      return $q;
    }

    public function retrieveOferta(Doctrine_Query $q)
    {
      return $this->addOfertasQuery($q)->fetchOne();
    }
    public function getOfertas(Doctrine_Query $q = null)
    {
      return $this->addOfertasQuery($q)->execute();
    }

    public function countOfertas(Doctrine_Query $q = null)
    {
         return $this->addOfertasQuery($q)->count();
    }
      
    public function getCostes()
    {
        $q = $this->createQuery('o')
        ->leftJoin('o.PRCoste c');
      return $q->execute();
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
      return sfConfig::get('sf_data_dir').'/oferta.'.sfConfig::get('sf_environment').'.index';
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
      $q = $this->addOfertasQuery($q);
      return $q->execute();
    }


}
