<?php

/**
 * PRLog form base class.
 *
 * @method PRLog getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePRLogForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'usuario_id'   => new sfWidgetFormInputHidden(),
      'oferta_id'    => new sfWidgetFormInputHidden(),
      'estado'       => new sfWidgetFormInputHidden(),
      'fecha_cambio' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'usuario_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'usuario_id', 'required' => false)),
      'oferta_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'oferta_id', 'required' => false)),
      'estado'       => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'estado', 'required' => false)),
      'fecha_cambio' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('pr_log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PRLog';
  }

}
