<?php

/**
 * PROferta form.
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */

class PROfertaFormBasic extends BasePROfertaForm
{
  public function configure()
  {
        unset(
          $this['fecha_actualizacion'], $this['estado'], $this['rentabilidad'],
          $this['costes'], $this['descuento'], $this['importe_licitacion'],
          $this['coste_financiacion'], $this['coste_estructura']
        );
        $this->personalize();
  }
  
  public function personalize()
  {
      $this->widgetSchema->setLabels(array(
          'competidor'    => '¿Quién es nuestro principal competidor?',
          'duracion'      => 'Duración del proyecto (días)',
          'tiempo_elaboracion'   => 'Tiempo estimado para elaborar la oferta (horas)',
        ));

      
      $this->widgetSchema['fecha_presentacion'] = new sfWidgetFormInputText(array(
        'label' => 'Fecha límite',
        ));
      $this->widgetSchema['fecha_creacion'] = new sfWidgetFormInputText(array(
        'label' => 'Fecha creación',
        ));
        
      $this->widgetSchema['tipo_facturacion'] = new sfWidgetFormSelectRadio(array(
          'choices' => array('Certificación mensual'=>'Certificación mensual','Por cumplimiento de hitos'=>'Por cumplimiento de hitos'),
          'label' => 'Tipo facturación',
          'separator'=> '',
          'label_separator'=> '',
        ));
        
      $this->widgetSchema['claridad'] = new sfWidgetFormSelectRadio(array(
          'choices' => array('1'=>'Sí', '0'=>'No'),
          'label' => '¿Tenemos identificadas claramente las necesidades de la oferta?',
          'separator'=> '',
          'label_separator'=> '',
        ));
        
      $this->widgetSchema['nuevo'] = new sfWidgetFormSelectRadio(array(
          'choices' => array('0'=>'Nuevo', '1'=>'Ampliación'),
          'label' => '¿Es un proyecto nuevo o una ampliación de uno ya existente?',
          'separator'=> '',
          'label_separator'=> '',
        ));
        
      $this->widgetSchema['experiencia'] = new sfWidgetFormSelectRadio(array(
          'choices' => array('1'=>'Sí', '0'=>'No'),
          'label' => '¿Tenemos experiencia en el desarrollo de este tipo de proyectos?',
          'separator'=> '',
          'label_separator'=> '',
        ));
        
      $this->widgetSchema['invitados'] = new sfWidgetFormSelectRadio(array(
          'choices' => array('1'=>'Sí', '0'=>'No'),
          'label' => '¿Hemos sido invitados a esta oferta?',
          'separator'=> '',
          'label_separator'=> '',
        ));
      
      $this->widgetSchema['aportacion'] = new sfWidgetFormSelectRadio(array(
          'choices' => array('1'=>'Sí', '0'=>'No'),
          'label' => '¿Podemos aportar valor y experiencia a esta oferta?',
          'separator'=> '',
          'label_separator'=> '',
        ));
    
      $this->widgetSchema['condicionada'] = new sfWidgetFormSelectRadio(array(
          'choices' => array('1'=>'Sí', '0'=>'No'),
          'label' => '¿Hay elementos condicionantes en esta oferta?',
          'separator'=> '',
          'label_separator'=> '',
        ));
      $this->widgetSchema['posicion_nuestra'] = new sfWidgetFormSelectRadio(array(
          'choices' => array('1'=>'Sí', '0'=>'No'),
          'label' => '¿Estamos bien posicionado con el cliente?',
          'separator'=> '',
          'label_separator'=> '',
        ));
        
      $this->widgetSchema['posicion_competencia'] = new sfWidgetFormSelectRadio(array(
          'choices' => array('1'=>'Sí', '0'=>'No'),
          'label' => '¿Está bien posicionada nuestra competencia?',
          'separator'=> '',
          'label_separator'=> '',
        ));
        
      $this->widgetSchema['ventaja'] = new sfWidgetFormSelectRadio(array(
          'choices' => array('1'=>'1', '2'=>'2','3'=>'3', '4'=>'4','5'=>'5'),
          'label' => 'Puntua de 1 a 5 nuestra ventaja competitiva',
          'separator'=> '',
          'label_separator'=> '',
        ));
        
      $this->widgetSchema['exito'] = new sfWidgetFormSelectRadio(array(
          'choices' => array('1'=>'Sí', '0'=>'No'),
          'label' => '¿Tenemos altas posibilidades de éxito?',
          'separator'=> '',
          'label_separator'=> '',
        ));
        
      $this->widgetSchema['enchufe'] = new sfWidgetFormSelectRadio(array(
          'choices' => array('1'=>'Sí', '0'=>'No'),
          'label' => '¿Tenemos el contacto técnico del cliente para esta oferta?',
          'separator'=> '',
          'label_separator'=> '',
        ));
        
      $this->widgetSchema['previamente'] = new sfWidgetFormSelectRadio(array(
          'choices' => array('1'=>'Sí', '0'=>'No'),
          'label' => '¿Hemos desarrollado otros proyectos con el cliente?',
          'separator'=> '',
          'label_separator'=> '',
        ));
        
      $this->widgetSchema['imagen'] = new sfWidgetFormSelectRadio(array(
          'choices' => array('1'=>'1', '2'=>'2','3'=>'3', '4'=>'4','5'=>'5'),
          'label' => 'Puntua de 1 a 5 nuestra imagen frente al cliente',
          'separator'=> '',
          'label_separator'=> '',
        ));
    }
}  
class PROfertaForm extends PROfertaFormBasic
{
  public function configure()
  {
        unset(
          $this['fecha_actualizacion']
        );
        $this->personalize();
        $this->embedCostes();
        $this->embedHitos();
  }

    protected function embedCostes()
    {
       $costes_forms = new sfForm();
       $costes = $this->getObject()->getCostes(); //getCostes
       if (false === sfContext::getInstance()->getRequest()->isXmlHttpRequest())
       {
           /*if (count($costes) == 0)  //if still empty, create 3 answers by default
           {
             for($i=0; $i<3; $i++)
             {
               $coste = new PRCoste();
               $coste->setOfertaId($this->getObject());
               $costes[] = $coste;
             }
           }*/
           foreach ($costes as $key=>$v)
           {
             $PRCosteForm = new PRCosteForm($v);
             $costes_forms->embedForm('pr_coste'.($key+1), $PRCosteForm);
             $costes_forms->widgetSchema['pr_coste'.($key+1)]->setLabel('Coste '.($key+1));
           }
       }
       $this->embedForm('pr_costes', $costes_forms);
       $this->widgetSchema['pr_costes']->setLabel('Costes');
    }

    //this function will be called from action to add form dynamically via ajax request
     public function addCostesForm($key)
     {
         $pr_coste = new PRCoste();
         $pr_coste->setOfertaId($this->getObject());
         $this->embeddedForms['pr_costes']->embedForm($key, new PRCosteForm($pr_coste));
         $this->embedForm('pr_costes', $this->embeddedForms['pr_costes']);
     }
     
    public function bind(array $taintedValues = null, array $taintedFiles = null)
    {
        if(isset($taintedValues['pr_costes'])){
            foreach($taintedValues['pr_costes'] as $key=>$form)
            {
               if (false === $this->embeddedForms['pr_costes']->offsetExists($key))
               {
                   $this->addCostesForm($key);
               }
            }
        }
        if(isset($taintedValues['pr_hitos'])){
             foreach($taintedValues['pr_hitos'] as $key=>$form)
            {
               if (false === $this->embeddedForms['pr_hitos']->offsetExists($key))
               {
                   $this->addHitosForm($key);
               }
            }
        }
        parent::bind($taintedValues, $taintedFiles);
    }
protected function embedHitos()
    {
       $hitos_forms = new sfForm();
       $hitos = $this->getObject()->getHitos(); //getHitos
       if (false === sfContext::getInstance()->getRequest()->isXmlHttpRequest())
       {
           foreach ($hitos as $key=>$v)
           {
             $PRHitoForm = new PRHitoForm($v);
             $hitos_forms->embedForm('pr_hito'.($key+1), $PRHitoForm);
             $hitos_forms->widgetSchema['pr_hito'.($key+1)]->setLabel('Hito '.($key+1));
           }
       }
       $this->embedForm('pr_hitos', $hitos_forms);
       $this->widgetSchema['pr_hitos']->setLabel('Hitos');
    }

    //this function will be called from action to add form dynamically via ajax request
     public function addHitosForm($key)
     {
         $pr_hito = new PRHito();
         $pr_hito->setOfertaId($this->getObject());
         $this->embeddedForms['pr_hitos']->embedForm($key, new PRHitoForm($pr_hito));
         $this->embedForm('pr_hitos', $this->embeddedForms['pr_hitos']);
     }
     


}

