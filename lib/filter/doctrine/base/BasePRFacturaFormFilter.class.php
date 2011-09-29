<?php

/**
 * PRFactura filter form base class.
 *
 * @package    jobeet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePRFacturaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estado'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TEstadoFactura'), 'add_empty' => true)),
      'proyecto_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PRProyecto'), 'add_empty' => true)),
      'importe'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'codigo'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fichero'     => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'estado'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TEstadoFactura'), 'column' => 'id')),
      'proyecto_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PRProyecto'), 'column' => 'id')),
      'importe'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'codigo'      => new sfValidatorPass(array('required' => false)),
      'fichero'     => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('pr_factura_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PRFactura';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'estado'      => 'ForeignKey',
      'proyecto_id' => 'ForeignKey',
      'importe'     => 'Number',
      'codigo'      => 'Text',
      'fichero'     => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
