<?php

/**
 * TEstado
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    jobeet
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TEstado extends BaseTEstado
{
    public function getOfertas($max = 10)
    {
    $q = $this->getOfertasQuery()
      ->limit($max);
    return $q->execute();

    }

/*    public function getSlug()
    {
      return PR::slugify($this->getName());
    }
*/
    public function countOfertas()
    {
      $q = Doctrine_Query::create()
        ->from('PROferta o')
        ->where('o.estado = ?', $this->getId());
      return Doctrine_Core::getTable('PROferta')->countOfertas($q);
    }

    public function getOfertasQuery()
    {
        $q = Doctrine_Query::create()
          ->from('PROferta o')
          ->where('o.estado = ?', $this->getId());
        return Doctrine_Core::getTable('PROferta')->addOfertasQuery($q);
    }

}