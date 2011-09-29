<?php

/**
 * PRProyecto form base class.
 *
 * @method PRProyecto getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePRProyectoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormInputText(),
      'pedido'               => new sfWidgetFormInputText(),
      'cliente_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PRCliente'), 'add_empty' => false)),
      'importe_contratacion' => new sfWidgetFormInputText(),
      'forma_pago'           => new sfWidgetFormInputText(),
      'tipo_facturacion'     => new sfWidgetFormInputText(),
      'duracion'             => new sfWidgetFormInputText(),
      'oferta_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PROferta'), 'add_empty' => true)),
      'responsable_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PREmpleado'), 'add_empty' => false)),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'                 => new sfValidatorString(array('max_length' => 255)),
      'pedido'               => new sfValidatorString(array('max_length' => 255)),
      'cliente_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PRCliente'))),
      'importe_contratacion' => new sfValidatorNumber(),
      'forma_pago'           => new sfValidatorString(array('max_length' => 255)),
      'tipo_facturacion'     => new sfValidatorString(array('max_length' => 255)),
      'duracion'             => new sfValidatorInteger(array('required' => false)),
      'oferta_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PROferta'), 'required' => false)),
      'responsable_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PREmpleado'))),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('pr_proyecto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PRProyecto';
  }

}
