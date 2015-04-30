#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use Acme\Console\Command\GreetCommand;
use Acme\Console\Command\GreetManyCommand;
use Acme\Console\Command\GreetGenderCommand;
use Acme\Console\Command\TextstyleCommand;
use Acme\Console\Command\FormatterExampleCommand;
use Acme\Console\Command\MetaCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Input\ArgvInput;

// Create a new event dispatcher.
$dispatcher = new EventDispatcher();

// Add a listener for the "COMMAND" event.
// This will be called before a command is executed.
$dispatcher->addListener(ConsoleEvents::COMMAND, function (ConsoleCommandEvent $event) {
  // get the input instance.
  $input = $event->getInput();
  $input->

  // get the output instance.
  $output = $event->getOutput();

  // get the command to be executed.
  $command = $event->getCommand();

  $output->writeln(sprintf('Logging this before running <info>%s</info>', $command->getName()));
});

// Create a new application.
$application = new Application('Danny\'s Console Tool', '0.1');

// Set dispatcher for application.
$application->setDispatcher($dispatcher);

// Add command objects.
$application->add(new GreetCommand());
$application->add(new GreetManyCommand());
$application->add(new GreetGenderCommand());
$application->add(new TextstyleCommand());
$application->add(new FormatterExampleCommand());
$application->add(new MetaCommand());
$application->run();