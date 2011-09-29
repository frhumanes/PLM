<?php

/**
 * PREmpleado form base class.
 *
 * @method PREmpleado getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePREmpleadoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'user_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'name'      => new sfWidgetFormInputText(),
      'apellidos' => new sfWidgetFormInputText(),
      'email'     => new sfWidgetFormInputText(),
      'perfil'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TRol'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'user_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'name'      => new sfValidatorString(array('max_length' => 255)),
      'apellidos' => new sfValidatorString(array('max_length' => 255)),
      'email'     => new sfValidatorString(array('max_length' => 255)),
      'perfil'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TRol'))),
    ));

    $this->widgetSchema->setNameFormat('pr_empleado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PREmpleado';
  }

}
