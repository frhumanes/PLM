<?php

/**
 * PRCoste form base class.
 *
 * @method PRCoste getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePRCosteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'oferta_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PROferta'), 'add_empty' => false)),
      'tipo_gasto'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TGasto'), 'add_empty' => false)),
      'concepto'    => new sfWidgetFormInputText(),
      'dedicacion'  => new sfWidgetFormInputText(),
      'importe'     => new sfWidgetFormInputText(),
      'coste_anual' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'oferta_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PROferta'))),
      'tipo_gasto'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TGasto'))),
      'concepto'    => new sfValidatorString(array('max_length' => 255)),
      'dedicacion'  => new sfValidatorInteger(array('required' => false)),
      'importe'     => new sfValidatorNumber(array('required' => false)),
      'coste_anual' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pr_coste[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PRCoste';
  }

}
