<?php

/**
 * PROferta form base class.
 *
 * @method PROferta getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePROfertaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'creador_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PREmpleado'), 'add_empty' => false)),
      'cliente_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PRCliente'), 'add_empty' => false)),
      'titulo'               => new sfWidgetFormTextarea(),
      'expediente'           => new sfWidgetFormInputText(),
      'descripcion_oferta'   => new sfWidgetFormTextarea(),
      'tipo_trabajo'         => new sfWidgetFormInputText(),
      'tipo_oferta'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TOferta'), 'add_empty' => false)),
      'base_licitacion'      => new sfWidgetFormInputText(),
      'fianza_provisional'   => new sfWidgetFormInputText(),
      'tipo_facturacion'     => new sfWidgetFormInputText(),
      'estructura'           => new sfWidgetFormInputText(),
      'financiacion'         => new sfWidgetFormInputText(),
      'descuento'            => new sfWidgetFormInputText(),
      'estado'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TEstado'), 'add_empty' => false)),
      'duracion'             => new sfWidgetFormInputText(),
      'fecha_presentacion'   => new sfWidgetFormDateTime(),
      'fecha_creacion'       => new sfWidgetFormDateTime(),
      'fecha_actualizacion'  => new sfWidgetFormDateTime(),
      'firma1'               => new sfWidgetFormInputCheckbox(),
      'firma2'               => new sfWidgetFormInputCheckbox(),
      'descripcion_pliego'   => new sfWidgetFormTextarea(),
      'claridad'             => new sfWidgetFormInputCheckbox(),
      'nuevo'                => new sfWidgetFormInputCheckbox(),
      'experiencia'          => new sfWidgetFormInputCheckbox(),
      'tiempo_elaboracion'   => new sfWidgetFormInputText(),
      'invitados'            => new sfWidgetFormInputCheckbox(),
      'aportacion'           => new sfWidgetFormInputCheckbox(),
      'condicionada'         => new sfWidgetFormInputCheckbox(),
      'enchufe'              => new sfWidgetFormInputCheckbox(),
      'contacto'             => new sfWidgetFormInputText(),
      'previamente'          => new sfWidgetFormInputCheckbox(),
      'imagen'               => new sfWidgetFormInputText(),
      'posicion_nuestra'     => new sfWidgetFormInputCheckbox(),
      'porque_posicion'      => new sfWidgetFormInputText(),
      'posicion_competencia' => new sfWidgetFormInputCheckbox(),
      'porque_competencia'   => new sfWidgetFormInputText(),
      'competidor'           => new sfWidgetFormInputText(),
      'ventaja'              => new sfWidgetFormInputText(),
      'exito'                => new sfWidgetFormInputCheckbox(),
      'porque_exito'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'creador_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PREmpleado'))),
      'cliente_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PRCliente'))),
      'titulo'               => new sfValidatorString(),
      'expediente'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'descripcion_oferta'   => new sfValidatorString(),
      'tipo_trabajo'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tipo_oferta'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TOferta'))),
      'base_licitacion'      => new sfValidatorNumber(array('required' => false)),
      'fianza_provisional'   => new sfValidatorNumber(array('required' => false)),
      'tipo_facturacion'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'estructura'           => new sfValidatorNumber(array('required' => false)),
      'financiacion'         => new sfValidatorNumber(array('required' => false)),
      'descuento'            => new sfValidatorInteger(array('required' => false)),
      'estado'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TEstado'), 'required' => false)),
      'duracion'             => new sfValidatorInteger(),
      'fecha_presentacion'   => new sfValidatorDateTime(),
      'fecha_creacion'       => new sfValidatorDateTime(),
      'fecha_actualizacion'  => new sfValidatorDateTime(),
      'firma1'               => new sfValidatorBoolean(array('required' => false)),
      'firma2'               => new sfValidatorBoolean(array('required' => false)),
      'descripcion_pliego'   => new sfValidatorString(array('max_length' => 4000)),
      'claridad'             => new sfValidatorBoolean(array('required' => false)),
      'nuevo'                => new sfValidatorBoolean(array('required' => false)),
      'experiencia'          => new sfValidatorBoolean(array('required' => false)),
      'tiempo_elaboracion'   => new sfValidatorInteger(array('required' => false)),
      'invitados'            => new sfValidatorBoolean(array('required' => false)),
      'aportacion'           => new sfValidatorBoolean(array('required' => false)),
      'condicionada'         => new sfValidatorBoolean(array('required' => false)),
      'enchufe'              => new sfValidatorBoolean(array('required' => false)),
      'contacto'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'previamente'          => new sfValidatorBoolean(array('required' => false)),
      'imagen'               => new sfValidatorInteger(array('required' => false)),
      'posicion_nuestra'     => new sfValidatorBoolean(array('required' => false)),
      'porque_posicion'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'posicion_competencia' => new sfValidatorBoolean(array('required' => false)),
      'porque_competencia'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'competidor'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ventaja'              => new sfValidatorInteger(array('required' => false)),
      'exito'                => new sfValidatorBoolean(array('required' => false)),
      'porque_exito'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pr_oferta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PROferta';
  }

}
