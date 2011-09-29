<?php

/**
 * PRHito filter form base class.
 *
 * @package    jobeet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePRHitoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'porcentaje' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'momento'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'oferta_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PROferta'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'porcentaje' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'momento'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'oferta_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PROferta'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('pr_hito_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PRHito';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'porcentaje' => 'Number',
      'momento'    => 'Number',
      'oferta_id'  => 'ForeignKey',
    );
  }
}
