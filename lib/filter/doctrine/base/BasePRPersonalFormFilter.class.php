<?php

/**
 * PRPersonal filter form base class.
 *
 * @package    jobeet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePRPersonalFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo_gasto'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TGasto'), 'add_empty' => true)),
      'categoria'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'coste_anual' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'tipo_gasto'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TGasto'), 'column' => 'id')),
      'categoria'   => new sfValidatorPass(array('required' => false)),
      'coste_anual' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('pr_personal_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PRPersonal';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'tipo_gasto'  => 'ForeignKey',
      'categoria'   => 'Text',
      'coste_anual' => 'Number',
    );
  }
}
