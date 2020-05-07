<?php
/**
 * Copyright © MIKO LLC - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Alexey Portnov, 4 2020
 */
use MikoPBX\Core\Config\{
    ClassLoader,
    RegisterDIServices
};
use MikoPBX\Common\Providers\ConfigProvider;
use Phalcon\Di\FactoryDefault\Cli;
use MikoPBX\Core\System\SentryErrorLogger;


// Initialize dependency injector
$di = new Cli();

// Register classes, namespaces, additional libraries
require_once 'ClassLoader.php';
ClassLoader::init();

$di->register(new ConfigProvider());
// Initialize sentry error logger
$errorLogger = new SentryErrorLogger('pbx-core-workers');
$errorLogger->init();

RegisterDIServices::init(true);
