<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Api\Controller\User' => 'Api\Controller\UserController',
            'Api\Controller\Code' => 'Api\Controller\CodeController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'api' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/api',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Api\Controller',
                        'controller'    => 'User',
                        'action'        => 'index',
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
        'code' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/api/code[/:action][/:id]',
                                    'constraints' => array(
                                    'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    'id' => '[0-9]+',
                                    ),
                                'defaults' => array(
                                'controller' => 'Api\Controller\Code',
                                'action' => 'index',
                                ),
                        ),
        ),
    ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Api' => __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
