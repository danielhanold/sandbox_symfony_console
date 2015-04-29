#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use Acme\Console\Command\GreetCommand;
use Acme\Console\Command\GreetManyCommand;
use Acme\Console\Command\TextstyleCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new GreetCommand());
$application->add(new GreetManyCommand());
$application->add(new TextstyleCommand());
$application->run();