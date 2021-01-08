<?php

declare(strict_types=1);

use App\Application\Commands\HashPasswordCommand;
use App\Application\Commands\LoadFixturesCommand;
use App\Infrastructure\Services\Hasher;
use DI\ContainerBuilder;
use Doctrine\ORM\EntityManagerInterface;
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
    HashPasswordCommand::class => function (ContainerInterface $c) {
        return new HashPasswordCommand(new Hasher());
    },
    LoadFixturesCommand::class => function (ContainerInterface $c) {
        $settings = $c->get('settings');
        return new LoadFixturesCommand(
            $c->get(EntityManagerInterface::class),
            $settings['fixture_paths']
        );
    }
];

return fn(ContainerBuilder $containerBuilder) => $containerBuilder
    ->addDefinitions($dependencies)
    ->addDefinitions($migrations)
    ->addDefinitions($doctrine)
    ->addDefinitions($commands);
