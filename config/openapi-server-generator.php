<?php

use Ensi\LaravelOpenApiServerGenerator\Generators\ControllersGenerator;
use Ensi\LaravelOpenApiServerGenerator\Generators\EnumsGenerator;
use Ensi\LaravelOpenApiServerGenerator\Generators\PestTestsGenerator;
use Ensi\LaravelOpenApiServerGenerator\Generators\RequestsGenerator;
use Ensi\LaravelOpenApiServerGenerator\Generators\RoutesGenerator;

return [
    /**
     * You can use as many yaml/json openapi entrypoints as you want.
     * Key = openapi entrypoint file with path.
     * Value = list of entities and their generator params.
     */
    'api_docs_mappings' => [
        public_path('api-docs/v1/index.yaml') => [
            'controllers' => [],
            'enums' => [
                'namespace' => "App\\Http\\ApiV1\\OpenApiGenerated\\Enums\\",
            ],
            'requests' => [
                'namespace' => ["Controllers" => "Requests"],
            ],
            'routes' => [
                'namespace' => "App\\Http\\ApiV1\\OpenApiGenerated\\",
            ],
            'pest_tests' => [
                'namespace' => ["Controllers" => "Tests"],
            ],
        ],
    ],

    /**
     * Full list of base namespaces that are supported in `api_docs_mappings`.
     */
    'namespaces_to_directories_mapping' => [
        'App\\' => app_path(),
    ],

    /**
     * List of supported entities and their corresponding generators
     */
    'supported_entities' => [
        'controllers' => ControllersGenerator::class,
        'enums' => EnumsGenerator::class,
        'requests' => RequestsGenerator::class,
        'routes' => RoutesGenerator::class,
        'pest_tests' => PestTestsGenerator::class,
    ],

    /**
     * List of entities generated by default.
     */
    'default_entities_to_generate' => [
        'controllers',
        'enums',
        'requests',
        'routes',
        'pest_tests',
    ],

    'extra_templates_path' => resource_path('openapi-server-generator/templates'),
];
