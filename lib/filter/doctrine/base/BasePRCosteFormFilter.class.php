<?php

/**
 * PRCoste filter form base class.
 *
 * @package    jobeet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePRCosteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'oferta_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PROferta'), 'add_empty' => true)),
      'tipo_gasto'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TGasto'), 'add_empty' => true)),
      'concepto'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dedicacion'  => new sfWidgetFormFilterInput(),
      'importe'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'coste_anual' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'oferta_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PROferta'), 'column' => 'id')),
      'tipo_gasto'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TGasto'), 'column' => 'id')),
      'concepto'    => new sfValidatorPass(array('required' => false)),
      'dedicacion'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'importe'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'coste_anual' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('pr_coste_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PRCoste';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'oferta_id'   => 'ForeignKey',
      'tipo_gasto'  => 'ForeignKey',
      'concepto'    => 'Text',
      'dedicacion'  => 'Number',
      'importe'     => 'Number',
      'coste_anual' => 'Number',
    );
  }
}
