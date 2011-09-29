<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('TGasto', 'doctrine');

/**
 * BaseTGasto
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $PRCoste
 * @property Doctrine_Collection $PRPersonal
 * 
 * @method integer             getId()         Returns the current record's "id" value
 * @method string              getName()       Returns the current record's "name" value
 * @method Doctrine_Collection getPRCoste()    Returns the current record's "PRCoste" collection
 * @method Doctrine_Collection getPRPersonal() Returns the current record's "PRPersonal" collection
 * @method TGasto              setId()         Sets the current record's "id" value
 * @method TGasto              setName()       Sets the current record's "name" value
 * @method TGasto              setPRCoste()    Sets the current record's "PRCoste" collection
 * @method TGasto              setPRPersonal() Sets the current record's "PRPersonal" collection
 * 
 * @package    jobeet
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTGasto extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('t_gasto');
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('PRCoste', array(
             'local' => 'id',
             'foreign' => 'tipo_gasto'));

        $this->hasMany('PRPersonal', array(
             'local' => 'id',
             'foreign' => 'tipo_gasto'));
    }
}