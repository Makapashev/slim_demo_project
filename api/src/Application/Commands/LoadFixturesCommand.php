<?php

declare(strict_types=1);

namespace App\Application\Commands;

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class LoadFixturesCommand extends Command
{
    /**@var string $defaultName */
    protected static $defaultName = 'app:fixtures-load';

    private EntityManagerInterface $em;
    /**
     * @var string[]
     */
    private array $paths;

    /**
     * @param EntityManagerInterface $em
     * @param string[] $paths
     */
    public function __construct(EntityManagerInterface $em, array $paths)
    {
        parent::__construct();
        $this->em = $em;
        $this->paths = $paths;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Load fixtures');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<comment>Loading fixtures</comment>');

        $loader = new Loader();

        foreach ($this->paths as $path) {
            $loader->loadFromDirectory($path);
        }

        $executor = new ORMExecutor($this->em, new ORMPurger());

        $executor->setLogger(static function (string $message) use ($output) {
            $output->writeln($message);
        });

        $executor->execute($loader->getFixtures());

        $output->writeln('<info>Done!</info>');

        return Command::SUCCESS;
    }
}