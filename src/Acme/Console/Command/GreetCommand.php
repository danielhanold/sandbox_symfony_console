<?php

namespace Acme\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;

class GreetCommand extends Command {
  protected function configure() {
    $this
      ->setName('demo:greet')
      ->setDescription('Greet someone')
      ->addArgument('name', InputArgument::REQUIRED, 'Who do you want to greet?')
      ->addArgument('last_name', InputArgument::OPTIONAL, 'Your last name')
      ->addOption('yell', NULL, InputOption::VALUE_NONE, 'If set, the task will yell in uppercase letters')
      ->addOption('iterations', null, InputOption::VALUE_REQUIRED, 'How many times should the message be printed', 1);
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    // Determine which color the output should be.
    $helper = $this->getHelper('question');
    $question = new ChoiceQuestion('Please select the color for the output', array('red', 'blue', 'yellow'), 0);
    $question->setErrorMessage('Color %s is invalid');

    $color = $helper->ask($input, $output, $question);
    $output->writeln('You selected color: ' . $color);

    $name = $input->getArgument('name');
    if ($name) {
      $text = 'Hello ' . $name;

      // If (optional) last name argument was included, add it.
      if ($last_name = $input->getArgument('last_name')) {
        $text .= ' ' . $last_name;
      }
    } else {
      $text = 'Hello';
    }

    if ($input->getOption('yell')) {
      $text = strtoupper($text);
    }

    for ($i = 0; $i < $input->getOption('iterations'); $i++) {
      $output->writeln($text);
    }
  }
}