<?php

declare(strict_types=1);

namespace BobdenOtter\Chmodinator\Command;

use BobdenOtter\Chmodinator\Chmodinator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class Chmod extends Command
{
    protected static $defaultName = 'chmodinator:do';

    /** @var Chmodinator */
    private $chmodinator;

    public function __construct(Chmodinator $chmodinator)
    {
        parent::__construct();

        $this->chmodinator = $chmodinator;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Runs <info>Chmodinator</info>, make cache, upload folders and others writable');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $io->text('Running Chmodinator on the CLI');
        $this->chmodinator->run();

        $this->chmodinator->httpRequest($io);

        $io->success('✅ ChmøĐïna✝️oR!!1 ran successfully 🤘');

        return 0;
    }
}
