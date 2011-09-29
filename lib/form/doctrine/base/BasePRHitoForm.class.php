<?php

/**
 * PRHito form base class.
 *
 * @method PRHito getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePRHitoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'porcentaje' => new sfWidgetFormInputText(),
      'momento'    => new sfWidgetFormInputText(),
      'oferta_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PROferta'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'porcentaje' => new sfValidatorInteger(),
      'momento'    => new sfValidatorInteger(),
      'oferta_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PROferta'))),
    ));

    $this->widgetSchema->setNameFormat('pr_hito[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PRHito';
  }

}
