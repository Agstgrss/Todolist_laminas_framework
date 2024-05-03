<?php

namespace Task;

use Laminas\ServiceManager\AbstractFactory\ReflectionBasedAbstractFactory;
use Laminas\Router\Http\Segment;
use Task\Model\TaskTableFactory;

return [

    'controllers' => [
        'factories' => [
            Controller\TaskController::class => ReflectionBasedAbstractFactory::class
        ],
    ],

    'router' => [
        'routes' => [
            'task' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/task[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\TaskController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'task' => __DIR__ . '/../view',
        ],
    ],
    'service_manager' => [
        'factories' => [
            Model\TaskTable::class => TaskTableFactory::class,
        ],

    ],
];