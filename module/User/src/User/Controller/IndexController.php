<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Form\Annotation\AnnotationBuilder;

use User\Model\User;

class IndexController extends AbstractActionController
{
    protected $userTable;

    protected $form;
    protected $storage;
    protected $authservice;

    public function getAuthService()
    {
        if (! $this->authservice) {
            $this->authservice = $this->getServiceLocator()
                                      ->get('AuthService');
        }
         
        return $this->authservice;
    }
    public function getSessionStorage()
    {
        if (! $this->storage) {
            $this->storage = $this->getServiceLocator()
                                  ->get('User\Model\UserAuthStorage');
        }
         
        return $this->storage;
    }
    public function getForm()
    {
        if (! $this->form) {
            $user       = new User();
            $builder    = new AnnotationBuilder();
            $this->form = $builder->createForm($user);
        }
         
        return $this->form;
    }
   /* public function indexAction()
    {
        
        return new ViewModel(array(
            'users' => $this->getUserTable()->fetchAll(),
        ));
    }*/

    public function loginAction()
    {
        //if already login, redirect to success page 
        if ($this->getAuthService()->hasIdentity()){
           // return $this->redirect()->toRoute('success');
        }
                 
        $form       = $this->getForm();
         
        return array(
            'form'      => $form,
            'messages'  => $this->flashmessenger()->getMessages()
        );
    }
    public function getUserTable()
    {
        if (!$this->userTable) {
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('User\Model\UserTable');
        }
        return $this->userTable;
    }

    
}
