<?php

/**
 * PRPersonal form base class.
 *
 * @method PRPersonal getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePRPersonalForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'tipo_gasto'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TGasto'), 'add_empty' => false)),
      'categoria'   => new sfWidgetFormInputText(),
      'coste_anual' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'tipo_gasto'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TGasto'))),
      'categoria'   => new sfValidatorString(array('max_length' => 255)),
      'coste_anual' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('pr_personal[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PRPersonal';
  }

}
