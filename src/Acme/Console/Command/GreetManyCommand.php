<?php

namespace Acme\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GreetManyCommand extends Command {
  protected function configure() {
    $this
      ->setName('demo:greet-many')
      ->setDescription('Greet many people at the same time')
      ->addArgument('names', InputArgument::IS_ARRAY, 'Which people (multiple possible) do you want to greet');
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $names = $input->getArgument('names');
    if ($names) {
      $text = 'Hello ' . implode(', ', $names);
    } else {
      $text = 'Hello';
    }

    $output->writeln($text);
  }
}