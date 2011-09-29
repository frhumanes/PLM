<?php

/**
 * cliente actions.
 *
 * @package    jobeet
 * @subpackage cliente
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
        // apps/frontend/modules/category/actions/actions.class.php
    class clienteActions extends sfActions
    {
    
        public function executeShowFacturas(sfWebRequest $request)
        {
          $this->cliente = $this->getRoute()->getObject();
          $this->pager = new sfDoctrinePager(
             'Facturas',
             sfConfig::get('app_max_facturas_on_cliente')
          );
          $this->pager->setQuery($this->cliente->getFacturasQuery());
          $this->pager->setPage($request->getParameter('page', 1));
          $this->pager->init();
        }

    }
