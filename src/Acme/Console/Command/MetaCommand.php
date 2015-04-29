<?php

namespace Acme\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\ArrayInput;

class MetaCommand extends Command {
  protected function configure() {
    $this
      ->setName('demo:meta')
      ->setDescription('Executes existing console action');
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    // Get command that should be executed.
    $command = $this->getApplication()->find('demo:greet-many');

    $arguments = array(
      'command' => 'demo:greet-many',
      'names' => array('Daniel', 'Lefty', 'Andrew'),
      '--machine' => true,
    );

    $input = new ArrayInput($arguments);
    $returnCode = $command->run($input, $output);
    $output->writeln('Return code: ' . $returnCode);
  }
}