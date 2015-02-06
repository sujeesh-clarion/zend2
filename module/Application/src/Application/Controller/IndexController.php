<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $authservice;

    public function getAuthService()
    {
        if (! $this->authservice) {
            $this->authservice = $this->getServiceLocator()
                                      ->get('AuthService');
        }
         
        return $this->authservice;
    }
    public function indexAction()
    {
        $data = array();
        //if already login, redirect to success page 
        if ($this->getAuthService()->hasIdentity()){
           // return $this->redirect()->toRoute('success');
            $data['isLoggedin'] = 1;
        }
        $view = new ViewModel($data);

       /* $appView = new ViewModel();
        $appView->setTemplate('layout/layout');*/
        $loginView = new ViewModel();
        $loginView->setTemplate('application/index/login');
        $view->addChild($loginView, 'login');
        return $view;
    }
}
