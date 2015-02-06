<?php
namespace Travel;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

 // Add these import statements:
 use Travel\Model\Destination;
 use Travel\Model\DestinationTable;
 use Travel\Model\Travel;
 use Travel\Model\TravelTable;
 use Zend\Db\ResultSet\ResultSet;
 use Zend\Db\TableGateway\TableGateway;

Class Module implements AutoloaderProviderInterface, ConfigProviderInterface {
    public function getAutoloaderConfig()
     {
         return array(
             'Zend\Loader\ClassMapAutoloader' => array(
                 __DIR__ . '/autoload_classmap.php',
             ),
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 ),
             ),
         );
     }
     
     // Add this method:
     public function getServiceConfig()
     {
         return array(
             'factories' => array(
                 'Travel\Model\DestinationTable' =>  function($sm) {
                     $tableGateway = $sm->get('DestinationTableGateway');
                     $table = new DestinationTable($tableGateway);
                     return $table;
                 },
                 'DestinationTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Destination());
                     return new TableGateway('destination', $dbAdapter, null, $resultSetPrototype);
                 },
                 'Travel\Model\TravelTable' =>  function($sm) {
                     $tableGateway = $sm->get('TravelTableGateway');
                     $table = new TravelTable($tableGateway);
                     return $table;
                 },
                 'TravelTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Travel());
                     return new TableGateway('travel', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
     
      public function getConfig()
     {
         return include __DIR__ . '/config/module.config.php';
     }

}

?>
