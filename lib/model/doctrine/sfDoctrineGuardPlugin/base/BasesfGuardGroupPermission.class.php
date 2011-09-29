<?php

/**
 * BasesfGuardGroupPermission
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $group_id
 * @property integer $permission_id
 * @property sfGuardGroup $sfGuardGroup
 * @property sfGuardPermission $sfGuardPermission
 * 
 * @method integer                getGroupId()           Returns the current record's "group_id" value
 * @method integer                getPermissionId()      Returns the current record's "permission_id" value
 * @method sfGuardGroup           getSfGuardGroup()      Returns the current record's "sfGuardGroup" value
 * @method sfGuardPermission      getSfGuardPermission() Returns the current record's "sfGuardPermission" value
 * @method sfGuardGroupPermission setGroupId()           Sets the current record's "group_id" value
 * @method sfGuardGroupPermission setPermissionId()      Sets the current record's "permission_id" value
 * @method sfGuardGroupPermission setSfGuardGroup()      Sets the current record's "sfGuardGroup" value
 * @method sfGuardGroupPermission setSfGuardPermission() Sets the current record's "sfGuardPermission" value
 * 
 * @package    jobeet
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardGroupPermission extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_group_permission');
        $this->hasColumn('group_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('permission_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 4,
             ));

        $this->option('symfony', array(
             'form' => false,
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardGroup', array(
             'local' => 'group_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('sfGuardPermission', array(
             'local' => 'permission_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}