<?php

/**
 * PRHistorico form base class.
 *
 * @method PRHistorico getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePRHistoricoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'factura_id' => new sfWidgetFormInputHidden(),
      'estado'     => new sfWidgetFormInputHidden(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'factura_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'factura_id', 'required' => false)),
      'estado'     => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'estado', 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('pr_historico[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PRHistorico';
  }

}
