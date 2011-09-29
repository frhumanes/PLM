<?php

/**
 * PRFactura form.
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PRFacturaForm extends BasePRFacturaForm
{
  public function configure()
  {
        unset(
          $this['created_at'], $this['updated_at']
        );
        $this->widgetSchema['fichero'] = new sfWidgetFormInputFile(array(
          'label' => 'Anexar fichero'
        ));

        $this->validatorSchema['fichero'] = new sfValidatorFile(array(
          'required'   => false,
          'path'       => sfConfig::get('sf_upload_dir').'/facturas',
          'mime_types' => array('application/pdf'),
          'max_size' => '8388607',
        ));

  }
}
