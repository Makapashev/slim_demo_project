<?php

namespace App\Application\Commands;

use App\Domain\Services\Hasher;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class HashPasswordCommand extends Command
{
    /**@var string $defaultName */
    protected static $defaultName = 'app:generate-hash';
    private Hasher $hasher;

    public function __construct(
        Hasher $hasher,
        string $name = null
    )
    {
        $this->hasher = $hasher;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setDescription('Command generates password hash')
            ->addArgument('password');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $password = $input->getArgument('password');
        if (!$password) {
            echo 'Insert password' . PHP_EOL;
            return Command::FAILURE;
        }
        echo $this->hasher->getHash($password) . PHP_EOL;
        return Command::SUCCESS;
    }
}