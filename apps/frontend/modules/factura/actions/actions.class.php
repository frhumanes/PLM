<?php

/**
 * factura actions.
 *
 * @package    jobeet
 * @subpackage factura
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class facturaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->estado_facturas = Doctrine::getTable('TEstadoFactura')->getConFacturas();
    $this->cliente_facturas = Doctrine::getTable('PRCliente')->getConFacturas();
    $this->meses_facturas = Doctrine::getTable('PRHistorico')->getMeses();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->pr_factura = Doctrine::getTable('PRFactura')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->pr_factura);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->forward404Unless($proyecto = Doctrine::getTable('PRProyecto')->find(array($request->getParameter('id'))));
    $factura = new PRFactura();
    $factura->setProyectoId($proyecto->getId());
    $this->form = new PRFacturaForm($factura);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PRFacturaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($pr_factura = Doctrine::getTable('PRFactura')->find(array($request->getParameter('id'))), sprintf('Object pr_factura does not exist (%s).', $request->getParameter('id')));
    $this->form = new PRFacturaForm($pr_factura);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($pr_factura = Doctrine::getTable('PRFactura')->find(array($request->getParameter('id'))), sprintf('Object pr_factura does not exist (%s).', $request->getParameter('id')));
    $this->form = new PRFacturaForm($pr_factura);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($pr_factura = Doctrine::getTable('PRFactura')->find(array($request->getParameter('id'))), sprintf('Object pr_factura does not exist (%s).', $request->getParameter('id')));
    $pr_factura->delete();

    $this->redirect('factura/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $pr_factura = $form->save();

      $this->redirect('proyecto/show?id='.$pr_factura->getProyectoId());
    }
  }
  
   private function avisarCambioEstado(PRFactura $pr_factura)
  {
    $recpt = $pr_factura->getMails();
    $message = $this->getMailer()->compose();
    $message->setSubject('[FACTURA '.$pr_factura->getCodigo().'] Aviso de cambio de estado');
    $message->setTo($recpt);
    $message->setFrom('plm.price@price-roch.es');
    $html = $this->getPartial('factura/mail',array('pr_factura'=>$pr_factura));
    $message->setBody($html, 'text/html');
    $this->getMailer()->send($message);

  }
  
  public function executeChangeEstado(sfWebRequest $request)
  {
    $error = true;
    try{
        $pr_factura = Doctrine::getTable('PRFactura')->find(array($request->getParameter('id')));
        $newestado = $request->getParameter('estado');
        if($newestado != $pr_factura->getEstado()){
            $pr_factura->setEstado($newestado);
            $pr_factura->save();
            $error = false;
            $this->avisarCambioEstado($pr_factura);
        }
    }catch (Exception $e) {
        $error = true;
    }
    if($error){
        return $this->renderPartial('factura/error', array('pr_factura'=>$pr_factura));
    }else{
        return $this->renderPartial('factura/correcto', array('pr_factura'=>$pr_factura));
    }
  }
}
