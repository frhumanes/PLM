<?php


class PREmpleadoTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PREmpleado');
    }
    
    public function getUsuario($id)
    {
      $q = Doctrine_Query::create()
          ->from('PREmpleado e')
          ->where('e.user_id = ?', $id);
      return $q->fetchOne();
    }
}
