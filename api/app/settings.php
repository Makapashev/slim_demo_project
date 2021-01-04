<?php
declare(strict_types=1);

use App\Infrastructure\DoctrineTypes\Account\BalanceType;
use App\Infrastructure\DoctrineTypes\Account\StatusType;
use App\Infrastructure\DoctrineTypes\Customer\EmailType;
use App\Infrastructure\DoctrineTypes\Customer\NameType;
use App\Infrastructure\DoctrineTypes\Customer\PhoneNumberType;
use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => [
            'displayErrorDetails' => true, // Should be set to false in production
            'logger' => [
                'name' => 'slim-app',
                'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                'level' => Logger::DEBUG,
            ],
            'doctrine' => [
                'dev_mode' => true,
                'cache_dir' => __DIR__ . '/../var/cache/doctrine/cache',
                'proxy_dir' => __DIR__ . '/../var/cache/doctrine/proxy',
                'connection' => [
                    'driver' => 'pdo_mysql',
                    'host' => getenv('DB_HOST'),
                    'user' => getenv('DB_USER'),
                    'password' => getenv('DB_PASSWORD'),
                    'dbname' => getenv('DB_NAME'),
                    'charset' => 'utf8'
                ],
                'subscribers' => [],
                'metadata_dirs' => [
                    __DIR__ . '/../src/Domain/Customer',
                    __DIR__ . '/../src/Domain/Account'
                ],
                'types' => [
                    BalanceType::NAME => BalanceType::class,
                    StatusType::NAME => StatusType::class,
                    EmailType::NAME => EmailType::class,
                    NameType::NAME => NameType::class,
                    PhoneNumberType::NAME => PhoneNumberType::class,
                    \App\Infrastructure\DoctrineTypes\Customer\StatusType::NAME =>
                        \App\Infrastructure\DoctrineTypes\Customer\StatusType::class
                ],
            ],
        ],
    ]);
};
