<?php

/**
 * PREmpleado filter form base class.
 *
 * @package    jobeet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePREmpleadoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'apellidos' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'perfil'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TRol'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'user_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'name'      => new sfValidatorPass(array('required' => false)),
      'apellidos' => new sfValidatorPass(array('required' => false)),
      'email'     => new sfValidatorPass(array('required' => false)),
      'perfil'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TRol'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('pr_empleado_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PREmpleado';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'user_id'   => 'ForeignKey',
      'name'      => 'Text',
      'apellidos' => 'Text',
      'email'     => 'Text',
      'perfil'    => 'ForeignKey',
    );
  }
}
