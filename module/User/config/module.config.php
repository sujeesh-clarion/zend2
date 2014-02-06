<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'User\Controller\Index' => 'User\Controller\IndexController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'user' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/user',
                    
                    'defaults' => array(
                        '__NAMESPACE__' => 'User\Controller',
                        'controller' => 'Index',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'login' => array(
                            'type'    => 'Literal',
                            'options' => array(
                                'route'    => '/auth',
                                'defaults' => array(
                                    '__NAMESPACE__' => 'User\Controller',
                                    'controller'    => 'Index',
                                    'action'        => 'login',
                                ),
                            ),
                            'may_terminate' => true,
                            'child_routes' => array(
                                'process' => array(
                                    'type'    => 'Segment',
                                    'options' => array(
                                        'route'    => '/[:action]',
                                        'constraints' => array(
                                            'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                            'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        ),
                                        'defaults' => array(
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        
                    ),
                ),

    'view_manager' => array(
        'template_path_stack' => array(
            'user' => __DIR__ . '/../view',
        ),
    ),
);