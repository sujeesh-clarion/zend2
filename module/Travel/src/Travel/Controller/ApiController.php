<?php
namespace Travel\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
  use Travel\Form\SearchForm;  
  use Travel\Model\Destination;
 use Zend\View\Model\JsonModel;

 class ApiController extends AbstractActionController
 {
     protected $destinationTable;
     protected $travelTable;
     public function indexAction()
     {
         die('aho');
     }
     
     public function searchAction()
     {
     }

     public function addAction()
     {
     }

     public function editAction()
     {
     }

     public function deleteAction()
     {
     }
     
     public function getDestinationTable()
     {
         if (!$this->destinationTable) {
             $sm = $this->getServiceLocator();
             $this->destinationTable = $sm->get('Travel\Model\DestinationTable');
         }
         return $this->destinationTable;
     }
     
      public function getTravelTable()
     {
         if (!$this->travelTable) {
             $sm = $this->getServiceLocator();
             $this->travelTable = $sm->get('Travel\Model\TravelTable');
         }
         return $this->travelTable;
     }
 }

