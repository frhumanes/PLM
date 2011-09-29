<?php

/**
 * coste actions.
 *
 * @package    jobeet
 * @subpackage coste
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class costeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $this->pr_costes = Doctrine::getTable('PROferta')->find(array($request->getParameter('id')))->getCostes();
  }
  
  public function executeNew(sfWebRequest $request)
  {
    $gasto = new PRCoste();
    $gasto->setOfertaId($request->getParameter('id'));
    $this->form = new PRCosteForm($gasto);
    
  }
  
    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new PRCosteForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }
      
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        { 
          $pr_coste = $form->save();
          #$this->redirect('coste_show', $pr_coste);
        }
    }
}
