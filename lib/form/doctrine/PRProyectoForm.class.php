<?php

/**
 * PRProyecto form.
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PRProyectoForm extends BasePRProyectoForm
{
  public function configure()
  {
      unset(
          $this['created_at'], $this['updated_at']
        );
      $this->widgetSchema['oferta_id']->setOption('is_hidden', 'true');
      $this->widgetSchema['cliente_id']->setAttribute('readonly','readonly');
      $this->widgetSchema['tipo_facturacion']->setAttribute('readonly','readonly');
      $this->widgetSchema['forma_pago'] = new sfWidgetFormSelectRadio(array(
          'choices' => array('Transferencia'=>'Transferencia bancaria','Pagaré'=>'Pagaré', 'Contado'=>'Al contado'),
          'label' => 'Forma de pago',
          'separator'=> '',
          'label_separator'=> '',
        ));
  }
}
