<?php

/**
 * PRProyecto filter form base class.
 *
 * @package    jobeet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePRProyectoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pedido'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cliente_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PRCliente'), 'add_empty' => true)),
      'importe_contratacion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'forma_pago'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo_facturacion'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'duracion'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'oferta_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PROferta'), 'add_empty' => true)),
      'responsable_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PREmpleado'), 'add_empty' => true)),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'                 => new sfValidatorPass(array('required' => false)),
      'pedido'               => new sfValidatorPass(array('required' => false)),
      'cliente_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PRCliente'), 'column' => 'id')),
      'importe_contratacion' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'forma_pago'           => new sfValidatorPass(array('required' => false)),
      'tipo_facturacion'     => new sfValidatorPass(array('required' => false)),
      'duracion'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'oferta_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PROferta'), 'column' => 'id')),
      'responsable_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PREmpleado'), 'column' => 'id')),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('pr_proyecto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PRProyecto';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'name'                 => 'Text',
      'pedido'               => 'Text',
      'cliente_id'           => 'ForeignKey',
      'importe_contratacion' => 'Number',
      'forma_pago'           => 'Text',
      'tipo_facturacion'     => 'Text',
      'duracion'             => 'Number',
      'oferta_id'            => 'ForeignKey',
      'responsable_id'       => 'ForeignKey',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
    );
  }
}
