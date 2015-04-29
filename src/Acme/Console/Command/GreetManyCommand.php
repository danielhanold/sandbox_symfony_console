<?php

namespace Acme\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

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

    // Only proceed if user confirms.
    $helper = $this->getHelper('question');
    $question = new ConfirmationQuestion('Do you really want to display these names? Enter y to continue.', FALSE);
    if (!$helper->ask($input, $output, $question)) {
      return;
    }

    $output->writeln($text);
  }
}