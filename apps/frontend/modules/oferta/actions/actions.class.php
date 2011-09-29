<?php

/**
 * oferta actions.
 *
 * @package    jobeet
 * @subpackage oferta
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ofertaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->estado_ofertas = Doctrine::getTable('TEstado')->getConOfertas();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->pr_oferta = Doctrine::getTable('PROferta')->find(array($request->getParameter('id')));
    $user = $this->getUser()->getGuardUser();
    $this->empleado = Doctrine::getTable('PREmpleado')->getUsuario($user->getId());
    $this->forward404Unless($this->pr_oferta);
  }

  public function executeDetail(sfWebRequest $request)
  {
    $this->pr_oferta = Doctrine::getTable('PROferta')->find(array($request->getParameter('id')));
    $this->costes = Doctrine::getTable('PROferta')->getCostes();
    $this->forward404Unless($this->pr_oferta);
  }

  public function executeNew(sfWebRequest $request)
  {
    $oferta = new PROferta();
    $now = date('d-m-Y H:m', time());
    $user = $this->getUser()->getGuardUser();
    $empleado = Doctrine::getTable('PREmpleado')->getUsuario($user->getId());
    $oferta->setFechaCreacion($now);
    $oferta->setCreadorId($empleado);
    $this->form = new PROfertaFormBasic($oferta);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PROfertaFormBasic();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($pr_oferta = Doctrine::getTable('PROferta')->find(array($request->getParameter('id'))), sprintf('Object pr_oferta does not exist (%s).', $request->getParameter('id')));
    $this->form = new PROfertaForm($pr_oferta);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($pr_oferta = Doctrine::getTable('PROferta')->find(array($request->getParameter('id'))), sprintf('Object pr_oferta does not exist (%s).', $request->getParameter('id')));
    $this->form = new PROfertaForm($pr_oferta);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($pr_oferta = Doctrine::getTable('PROferta')->find(array($request->getParameter('id'))), sprintf('Object pr_oferta does not exist (%s).', $request->getParameter('id')));
    $pr_oferta->delete();

    $this->redirect('oferta/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    { 
      $now = date('Y-m-d H:m', time());
      $pr_oferta = $form->save();
      if ($form->getObject()->isNew())
      {
          $pr_oferta->setFechaCreacion($now);
      }
      $pr_oferta->setFechaActualizacion($now);
      $pr_oferta->save();
      if($pr_oferta->getEstado() == '1'){
        $this->redirect('oferta_edit', $pr_oferta);
      }else{
        $this->redirect('oferta_show', $pr_oferta);
      }
    }
  }
  
  private function avisarCambioEstado(PROferta $pr_oferta)
  {
    $recpt = $pr_oferta->getMails();
    $message = $this->getMailer()->compose();
    $message->setSubject('[OFERTA '.$pr_oferta->getCodigo().'] Aviso de cambio de estado');
    $message->setTo($recpt);
    $message->setFrom('plm.price@price-roch.es');
    $html = $this->getPartial('oferta/mail',array('pr_oferta'=>$pr_oferta));
    $message->setBody($html, 'text/html');
    $this->getMailer()->send($message);

  }
  
  public function executeChangeEstado(sfWebRequest $request)
  {
    $this->forward404Unless($pr_oferta = Doctrine::getTable('PROferta')->find(array($request->getParameter('id'))), sprintf('Object pr_oferta does not exist (%s).', $request->getParameter('id')));
    $user = $this->getUser()->getGuardUser();
    $empleado = Doctrine::getTable('PREmpleado')->getUsuario($user->getId());
    $newestado = $request->getParameter('estado');
    if($newestado == 3 && $empleado->puedeValidar()){
        $empleado->firmarOferta($pr_oferta);
    }elseif($newestado == 3){
        $this->getUser()->setFlash('error', sprintf('No tiene permisos para realizar dicha acción'));
    }
    if($newestado != 3 || ($pr_oferta->getFirma1() && $pr_oferta->getFirma2())){
        $pr_oferta->setEstado($newestado);
        $pr_oferta->save();
        $this->getUser()->setFlash('notice', sprintf('La oferta %s ha pasado a estado %s.', $pr_oferta->getCodigo(), $pr_oferta->getNombreEstado()));
        $this->avisarCambioEstado($pr_oferta);
    }
    if($pr_oferta->getNombreEstado() == 'Adjudicada'){
        $pr_oferta->setEstado(5);
        $pr_oferta->save();
        $this->avisarCambioEstado($pr_oferta);
        $this->redirect('nuevo_proyecto', $pr_oferta);
    }else{
        $this->redirect('oferta/index');
    }
  }
  
  public function executeNewCliente(sfWebRequest $request)
  {
    $cliente = new PRCliente();
    $cliente->setName($request->getParameter('nombre'));
    $cliente->setDireccion($request->getParameter('direccion'));
    try{
        $cliente->save();
        return $this->renderPartial('cliente/addCliente', array('pr_cliente'=>$cliente));
    }catch(Exception $e){
        echo $e->getMessage();
        return $this->renderPartial('cliente/addCliente');
    }
  }
  //sf_pollActions
  public function executeAddCostesForm(sfWebRequest $request)
  {
    $this->forward404Unless($request->isXmlHttpRequest());
    if ($pr_oferta = Doctrine::getTable('PROferta')->find(array($request->getParameter('id'))))
    {
        $form = new PROfertaForm($pr_oferta);
    }
    else
    {
        $form = new PROfertaForm();
    }
    $number = $request->getParameter('num')+1;
    $key = 'pr_coste'.$number;
    $form->addCostesForm($key);
    return $this->renderPartial('addCostesForm',array('field' => $form['pr_costes'][$key], 'num' => $number));
  }

  public function executeAddHitosForm(sfWebRequest $request)
  {
    $this->forward404Unless($request->isXmlHttpRequest());
    if ($pr_oferta = Doctrine::getTable('PROferta')->find(array($request->getParameter('id'))))
    {
        $form = new PROfertaForm($pr_oferta);
    }
    else
    {
        $form = new PROfertaForm();
    }
    $number = $request->getParameter('num')+1;
    $key = 'pr_hito'.$number;
    $form->addHitosForm($key);
    return $this->renderPartial('addHitosForm',array('field' => $form['pr_hitos'][$key], 'num' => $number));
  }

}
