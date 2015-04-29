<?php

namespace Acme\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class FormatterExampleCommand extends Command {
  protected function configure() {
    $this
      ->setName('demo:formatter-example')
      ->setDescription('Show some example formatting');
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    // Add text into a section.
    $formatter = $this->getHelper('formatter');
    $formatted_line = $formatter->formatSection('Section Number 1', 'Here is some message related to this section.');
    $output->writeln($formatted_line);

    // Add a blank line.
    $output->writeln('');

    // Show text in a block.
    $errorMessages = array('Error!', 'Something went wrong. JK. This is just a test.');
    $formattedBlock = $formatter->formatBlock($errorMessages, 'error', true);
    $output->writeln($formattedBlock);
  }
}