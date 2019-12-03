<?php

return array(
    'template' => array(
        'Request'            => array(
            'resource' => 'template/Request.php',
            'target'   => 'app/Http/Requests/',
            'needDir'  => true,
        ),
        'Controller'         => array(
            'resource'  => 'template/Controller.php',
            'target'    => 'app/Http/Controllers/V1/',
            'namespace' => 'App/',
            'needDir'   => false,
        ),
        'Model'              => array(
            'resource' => 'template/Model.php',
            'target'   => 'app/Models/',
            'needDir'  => false,
        ),
        'RepositoryEloquent' => array(
            'resource' => 'template/Repository.php',
            'target'   => 'app/Repositories/',
            'needDir'  => true,
        ),
        'Repository'         => array(
            'resource' => 'template/Interface.php',
            'target'   => 'app/Interfaces/',
            'needDir'  => false,
        ),
        'Route'              => array(
            'resource' => 'template/V2/Route.php',
            'target'   => 'Routes/',
            'needDir'  => true,
        ),
        'Transformer'        => array(
            'resource' => 'template/Transformer.php',
            'target'   => 'app/Transformers/',
            'needDir'  => false,
        ),
        'Factory'            => array(
            'resource' => 'template/Factory.php',
            'target'   => 'database/factories/',
            'needDir'  => false,
        ),
        'Test'               => array(
            'resource' => 'template/Tests.php',
            'target'   => 'Tests/',
            'needDir'  => true,
        ),
        'Seeder'             => array(
            'resource' => 'template/Seeder.php',
            'target'   => 'database/seeds/',
            'needDir'  => true,
        ),
        'Lang'               => array(
            'resource' => 'template/Lang.php',
            'target'   => 'resources/lang/',
            'needDir'  => true,
            'lang'     => true,
        ),
    ),
    'using_repository' => false,
);