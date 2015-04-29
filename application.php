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

// Create a new application.
$application = new Application('Danny\'s Console Tool', '0.1');

// Add command objects.
$application->add(new GreetCommand());
$application->add(new GreetManyCommand());
$application->add(new GreetGenderCommand());
$application->add(new TextstyleCommand());
$application->add(new FormatterExampleCommand());
$application->add(new MetaCommand());
$application->run();