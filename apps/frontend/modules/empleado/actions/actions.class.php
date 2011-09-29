<?php

/**
 * factura actions.
 *
 * @package    jobeet
 * @subpackage factura
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class empleadoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getGuardUser();
    $this->forwardUnless($this->empleado = Doctrine::getTable('PREmpleado')->getUsuario($this->user->getId()), 'oferta', 'index');
    $misOfertas = Doctrine_Query::create()
          ->from('PROferta o')
          ->where('o.creador_id = ?', $this->empleado->getId())
          ->orderBy('o.estado ASC');
    $misProyectos = Doctrine_Query::create()
          ->from('PRProyecto o')
          ->where('o.responsable_id = ?', $this->empleado->getId())
          ->orderBy('o.created_at DESC');
    $this->ofertas = $misOfertas->execute();
    $this->proyectos = $misProyectos->execute();
    $this->facturas = Doctrine::getTable('PRFactura')->addFacturasQuery()->execute();
  }
  
  public function executeSearch(sfWebRequest $request)
  {
    $this->forwardUnless($query = $request->getParameter('query'), 'empleado','index');
    $this->query = $query;
    $this->ofertas = Doctrine_Core::getTable('PROferta')
        ->getForLuceneQuery($query);
    $this->proyectos = Doctrine_Core::getTable('PRProyecto')
        ->getForLuceneQuery($query);
    $this->facturas = Doctrine_Core::getTable('PRFactura')
        ->getForLuceneQuery($query);
  }

}
