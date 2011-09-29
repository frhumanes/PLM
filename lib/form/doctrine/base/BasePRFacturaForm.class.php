<?php

/**
 * PRFactura form base class.
 *
 * @method PRFactura getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePRFacturaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'estado'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TEstadoFactura'), 'add_empty' => false)),
      'proyecto_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PRProyecto'), 'add_empty' => false)),
      'importe'     => new sfWidgetFormInputText(),
      'codigo'      => new sfWidgetFormInputText(),
      'fichero'     => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'estado'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TEstadoFactura'))),
      'proyecto_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PRProyecto'))),
      'importe'     => new sfValidatorInteger(),
      'codigo'      => new sfValidatorString(array('max_length' => 255)),
      'fichero'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('pr_factura[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PRFactura';
  }

}
