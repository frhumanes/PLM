<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PRCliente', 'doctrine');

/**
 * BasePRCliente
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $direccion
 * @property Doctrine_Collection $PROferta
 * @property Doctrine_Collection $PRProyecto
 * 
 * @method integer             getId()         Returns the current record's "id" value
 * @method string              getName()       Returns the current record's "name" value
 * @method string              getDireccion()  Returns the current record's "direccion" value
 * @method Doctrine_Collection getPROferta()   Returns the current record's "PROferta" collection
 * @method Doctrine_Collection getPRProyecto() Returns the current record's "PRProyecto" collection
 * @method PRCliente           setId()         Sets the current record's "id" value
 * @method PRCliente           setName()       Sets the current record's "name" value
 * @method PRCliente           setDireccion()  Sets the current record's "direccion" value
 * @method PRCliente           setPROferta()   Sets the current record's "PROferta" collection
 * @method PRCliente           setPRProyecto() Sets the current record's "PRProyecto" collection
 * 
 * @package    jobeet
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePRCliente extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('p_r_cliente');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('direccion', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('PROferta', array(
             'local' => 'id',
             'foreign' => 'cliente_id'));

        $this->hasMany('PRProyecto', array(
             'local' => 'id',
             'foreign' => 'cliente_id'));

        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->actAs($sluggable0);
    }
}