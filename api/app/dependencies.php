<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

$doctrine = require __DIR__ . '/doctrine.php';
$commands = require __DIR__ . '/console.php';
$migrations = require __DIR__ . '/migrations.php';

$dependencies = [
    LoggerInterface::class => function (ContainerInterface $c) {
        $settings = $c->get('settings');

        $loggerSettings = $settings['logger'];
        $logger = new Logger($loggerSettings['name']);

        $processor = new UidProcessor();
        $logger->pushProcessor($processor);

        $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
        $logger->pushHandler($handler);

        return $logger;
    },
];

return fn(ContainerBuilder $containerBuilder) => $containerBuilder
    ->addDefinitions($dependencies)
    ->addDefinitions($migrations)
    ->addDefinitions($doctrine)
    ->addDefinitions($commands);
