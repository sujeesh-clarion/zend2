<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Api\Controller;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

use User\Model\User;



class UserController extends AbstractRestfulController
{
    protected $userTable;
    public function indexAction()
    {
        return new JsonModel(array('data' => "Welcome to the Zend Framework Album API example"));

    }
    public function loginAction()
    {
        $sm = $this->getServiceLocator();
        $user = new User;

        $this->userTable = $sm->get('User\Model\UserTable');
       
        $user->email = $this->getRequest()->getPost('email');
        $user->password = $this->getRequest()->getPost('password');
        
       
        $row = $this->userTable->getByField(array('email' => $user->email));

       return new JsonModel(array('data' => "Welcome to the Zend Framework Album API example"));

    }
    public function signupAction()
    {
        $sm = $this->getServiceLocator();
        $user = new User;

        $this->userTable = $sm->get('User\Model\UserTable');
        $user->full_name = $this->getRequest()->getPost('full_name');
        $user->email = $this->getRequest()->getPost('email');
        $user->password = $this->getRequest()->getPost('password');
        
       
        $row = $this->userTable->getByField(array('email' => $user->email));
        if ($row) {
            $status['error'] = 1;
            $status['msg'] = 'Email already Exists';
            return new JsonModel($status);
        }
        
        $this->userTable->saveUser($user);


     //   echo "<pre>";print_r($data);
        return new JsonModel(array('error'=>0,'msg' => "Welcome to Clarion Codebank"));

    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /module-specific-root/skeleton/foo
        return array();
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
