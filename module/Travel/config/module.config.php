<?php
   return array(
     'controllers' => array(
         'invokables' => array(
             'Travel\Controller\Travel' => 'Travel\Controller\TravelController',
             'Travel\Controller\Api' => 'Travel\Controller\ApiController',
             'Travel\Controller\Destination' => 'Travel\Controller\DestinationController',
         ),
     ),
     
     // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'travel' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/travel[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Travel\Controller\Travel',
                         'action'     => 'index',
                     ),
                 ),
             ),
             
             'destination' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/travel/places[/][/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Travel\Controller\Destination',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'travel' => __DIR__ . '/../view',
         ),
     ),
 );
?>
