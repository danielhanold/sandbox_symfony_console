<?php

namespace Acme\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class TextstyleCommand extends Command {
  protected function configure() {
    $this
      ->setName('demo:text-style')
      ->setDescription('Shows off different text styles');
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    // green text
    $output->writeln('<info>foo</info>');

    // yellow text
    $output->writeln('<comment>foo</comment>');

    // black text on a cyan background
    $output->writeln('<question>foo</question>');

    // white text on a red background
    $output->writeln('<error>foo</error>');

    // green text
    $output->writeln('<fg=green>foo</fg=green>');

    // black text on a cyan background
    $output->writeln('<fg=black;bg=cyan>foo</fg=black;bg=cyan>');

    // bold text on a yellow background
    $output->writeln('<bg=yellow;options=bold>foo</bg=yellow;options=bold>');

    $style = new OutputFormatterStyle('red', 'yellow', array('bold', 'blink'));
    $output->getFormatter()->setStyle('fire', $style);
    $output->writeln('<fire>foo</fire>');
  }
}