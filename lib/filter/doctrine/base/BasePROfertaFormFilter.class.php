<?php

/**
 * PROferta filter form base class.
 *
 * @package    jobeet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePROfertaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'creador_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PREmpleado'), 'add_empty' => true)),
      'cliente_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PRCliente'), 'add_empty' => true)),
      'titulo'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'expediente'           => new sfWidgetFormFilterInput(),
      'descripcion_oferta'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo_trabajo'         => new sfWidgetFormFilterInput(),
      'tipo_oferta'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TOferta'), 'add_empty' => true)),
      'base_licitacion'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fianza_provisional'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo_facturacion'     => new sfWidgetFormFilterInput(),
      'estructura'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'financiacion'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descuento'            => new sfWidgetFormFilterInput(),
      'estado'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TEstado'), 'add_empty' => true)),
      'duracion'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_presentacion'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_creacion'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_actualizacion'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'firma1'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'firma2'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'descripcion_pliego'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'claridad'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'nuevo'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'experiencia'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'tiempo_elaboracion'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'invitados'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'aportacion'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'condicionada'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'enchufe'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'contacto'             => new sfWidgetFormFilterInput(),
      'previamente'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'imagen'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'posicion_nuestra'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'porque_posicion'      => new sfWidgetFormFilterInput(),
      'posicion_competencia' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'porque_competencia'   => new sfWidgetFormFilterInput(),
      'competidor'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ventaja'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'exito'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'porque_exito'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'creador_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PREmpleado'), 'column' => 'id')),
      'cliente_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PRCliente'), 'column' => 'id')),
      'titulo'               => new sfValidatorPass(array('required' => false)),
      'expediente'           => new sfValidatorPass(array('required' => false)),
      'descripcion_oferta'   => new sfValidatorPass(array('required' => false)),
      'tipo_trabajo'         => new sfValidatorPass(array('required' => false)),
      'tipo_oferta'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TOferta'), 'column' => 'id')),
      'base_licitacion'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'fianza_provisional'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'tipo_facturacion'     => new sfValidatorPass(array('required' => false)),
      'estructura'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'financiacion'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'descuento'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'estado'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TEstado'), 'column' => 'id')),
      'duracion'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_presentacion'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fecha_creacion'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fecha_actualizacion'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'firma1'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'firma2'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'descripcion_pliego'   => new sfValidatorPass(array('required' => false)),
      'claridad'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'nuevo'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'experiencia'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'tiempo_elaboracion'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'invitados'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'aportacion'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'condicionada'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'enchufe'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'contacto'             => new sfValidatorPass(array('required' => false)),
      'previamente'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'imagen'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'posicion_nuestra'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'porque_posicion'      => new sfValidatorPass(array('required' => false)),
      'posicion_competencia' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'porque_competencia'   => new sfValidatorPass(array('required' => false)),
      'competidor'           => new sfValidatorPass(array('required' => false)),
      'ventaja'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'exito'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'porque_exito'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pr_oferta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PROferta';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'creador_id'           => 'ForeignKey',
      'cliente_id'           => 'ForeignKey',
      'titulo'               => 'Text',
      'expediente'           => 'Text',
      'descripcion_oferta'   => 'Text',
      'tipo_trabajo'         => 'Text',
      'tipo_oferta'          => 'ForeignKey',
      'base_licitacion'      => 'Number',
      'fianza_provisional'   => 'Number',
      'tipo_facturacion'     => 'Text',
      'estructura'           => 'Number',
      'financiacion'         => 'Number',
      'descuento'            => 'Number',
      'estado'               => 'ForeignKey',
      'duracion'             => 'Number',
      'fecha_presentacion'   => 'Date',
      'fecha_creacion'       => 'Date',
      'fecha_actualizacion'  => 'Date',
      'firma1'               => 'Boolean',
      'firma2'               => 'Boolean',
      'descripcion_pliego'   => 'Text',
      'claridad'             => 'Boolean',
      'nuevo'                => 'Boolean',
      'experiencia'          => 'Boolean',
      'tiempo_elaboracion'   => 'Number',
      'invitados'            => 'Boolean',
      'aportacion'           => 'Boolean',
      'condicionada'         => 'Boolean',
      'enchufe'              => 'Boolean',
      'contacto'             => 'Text',
      'previamente'          => 'Boolean',
      'imagen'               => 'Number',
      'posicion_nuestra'     => 'Boolean',
      'porque_posicion'      => 'Text',
      'posicion_competencia' => 'Boolean',
      'porque_competencia'   => 'Text',
      'competidor'           => 'Text',
      'ventaja'              => 'Number',
      'exito'                => 'Boolean',
      'porque_exito'         => 'Text',
    );
  }
}
