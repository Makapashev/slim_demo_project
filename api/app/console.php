<?php

declare(strict_types=1);

use Doctrine\Migrations\Tools\Console\Command;
use Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand;
use Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand;

return [
    'commands' => [
        ValidateSchemaCommand::class,
        //Doctrine Migrations
        Command\ExecuteCommand::class,
        Command\MigrateCommand::class,
        Command\LatestCommand::class,
        Command\ListCommand::class,
        Command\StatusCommand::class,
        Command\UpToDateCommand::class,
        Command\DiffCommand::class,
    ]
];
