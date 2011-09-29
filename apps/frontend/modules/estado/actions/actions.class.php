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
    class estadoActions extends sfActions
    {
    
        public function executeShow(sfWebRequest $request)
        {
          $this->estado = $this->getRoute()->getObject();
          $this->pager = new sfDoctrinePager(
             'Ofertas',
             sfConfig::get('app_max_ofertas_on_estado')
          );
          $this->pager->setQuery($this->estado->getOfertasQuery());
          $this->pager->setPage($request->getParameter('page', 1));
          $this->pager->init();
        }

    }
