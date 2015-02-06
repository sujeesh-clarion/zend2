<?php
namespace Travel\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
  use Travel\Form\SearchForm;  
  use Travel\Model\Destination;
  use Travel\Model\Travel;

 class TravelController extends AbstractActionController
 {
     protected $destinationTable;
     protected $travelTable;
     public function indexAction()
     {
          
          
          $data = $this->getRequest()->getQuery();
          
          //echo "<pre>";print_r($data->q);echo "</pre>";
          if(!empty($data)){
              $result['destinations'] =   $this->getDestinationTable()->fetchAll(array('title'=>$data->q)) ;
               
          } else {
             $result['destinations'] =   $this->getDestinationTable()->fetchAll();  
          }
        //   $result['destinations'] =   $this->getDestinationTable()->fetchAll(); 
          return new ViewModel($result);           
        
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

