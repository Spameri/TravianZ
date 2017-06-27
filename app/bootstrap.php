<?php

require_once __DIR__ . '/../vendor/autoload.php';

$configurator = new \Nette\Configurator;
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->enableDebugger(__DIR__ . '/../log');

$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/install.neon');

if (file_exists(__DIR__ . '/config/local.neon')) {
	$configurator->addConfig(__DIR__ . '/config/local.neon');

} else {
	$configurator->addConfig(__DIR__ . '/config/default.neon');
}

$configurator->setDebugMode(TRUE);

return $configurator->createContainer();