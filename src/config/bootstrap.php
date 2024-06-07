<?php

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    EntityManager::class => function() {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__ . '/../Domain'],
            true
        );

        return EntityManager::create([
            'url' => $_ENV['DATABASE_URL']
        ], $config);
    }
]);

$container = $containerBuilder->build();
AppFactory::setContainer($container);
$app = AppFactory::create();

(require __DIR__ . '/routes.php')($app);

return $app;
