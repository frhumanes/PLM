<?php

/**
 * proyecto actions.
 *
 * @package    jobeet
 * @subpackage proyecto
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class proyectoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager(
        'Proyectos',
         sfConfig::get('app_max_ofertas_on_estado')
    );
    $this->pager->setQuery(Doctrine::getTable('PRProyecto')->createQuery('a'));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->pr_proyecto = Doctrine::getTable('PRProyecto')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->pr_proyecto);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->forward404Unless($pr_oferta = Doctrine::getTable('PROferta')->find(array($request->getParameter('id'))));
    $newProyecto = new PRProyecto();
    $newProyecto->setOfertaId($pr_oferta->getId());
    $newProyecto->setName($pr_oferta->getTitulo());
    $newProyecto->setImporteContratacion($pr_oferta->getImporteOferta());
    $newProyecto->setTipoFacturacion($pr_oferta->getTipoFacturacion());
    $newProyecto->setClienteId($pr_oferta->getClienteId());
    $newProyecto->setDuracion($pr_oferta->getDuracion());
    $this->form = new PRProyectoForm($newProyecto);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PRProyectoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($pr_proyecto = Doctrine::getTable('PRProyecto')->find(array($request->getParameter('id'))), sprintf('Object pr_proyecto does not exist (%s).', $request->getParameter('id')));
    $this->form = new PRProyectoForm($pr_proyecto);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($pr_proyecto = Doctrine::getTable('PRProyecto')->find(array($request->getParameter('id'))), sprintf('Object pr_proyecto does not exist (%s).', $request->getParameter('id')));
    $this->form = new PRProyectoForm($pr_proyecto);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($pr_proyecto = Doctrine::getTable('PRProyecto')->find(array($request->getParameter('id'))), sprintf('Object pr_proyecto does not exist (%s).', $request->getParameter('id')));
    $pr_proyecto->delete();

    $this->redirect('proyecto/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $pr_proyecto = $form->save();
      $pr_oferta = $pr_proyecto->getOferta();
      $pr_oferta->setEstado(5);
      $pr_oferta->save();
      $this->redirect('proyecto/show?id='.$pr_proyecto->getId());
    }
  }
}
