<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PRPersonal', 'doctrine');

/**
 * BasePRPersonal
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $tipo_gasto
 * @property string $categoria
 * @property integer $coste_anual
 * @property TGasto $TGasto
 * 
 * @method integer    getId()          Returns the current record's "id" value
 * @method integer    getTipoGasto()   Returns the current record's "tipo_gasto" value
 * @method string     getCategoria()   Returns the current record's "categoria" value
 * @method integer    getCosteAnual()  Returns the current record's "coste_anual" value
 * @method TGasto     getTGasto()      Returns the current record's "TGasto" value
 * @method PRPersonal setId()          Sets the current record's "id" value
 * @method PRPersonal setTipoGasto()   Sets the current record's "tipo_gasto" value
 * @method PRPersonal setCategoria()   Sets the current record's "categoria" value
 * @method PRPersonal setCosteAnual()  Sets the current record's "coste_anual" value
 * @method PRPersonal setTGasto()      Sets the current record's "TGasto" value
 * 
 * @package    jobeet
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePRPersonal extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('p_r_personal');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('tipo_gasto', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('categoria', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('coste_anual', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('TGasto', array(
             'local' => 'tipo_gasto',
             'foreign' => 'id'));
    }
}