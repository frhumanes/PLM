<?php

/**
 * estado actions.
 *
 * @package    jobeet
 * @subpackage estado
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
        // apps/frontend/modules/category/actions/actions.class.php
    class estado_facturaActions extends sfActions
    {
    
        public function executeShow(sfWebRequest $request)
        {
          $this->estado = $this->getRoute()->getObject();
          $this->pager = new sfDoctrinePager(
             'Facturas',
             sfConfig::get('app_max_facturas_on_estado')
          );
          $this->pager->setQuery($this->estado->getFacturasQuery());
          $this->pager->setPage($request->getParameter('page', 1));
          $this->pager->init();
        }

    }
