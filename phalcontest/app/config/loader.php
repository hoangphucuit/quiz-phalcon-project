<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->formsDir,
        $config->application->libraryDir . 'PHPExcel/Classes/',
        $config->application->pluginsDir,
    ]
);

$loader->registerNamespaces(
    array(
        "Plugins"=>$config->application->pluginsDir,
       "Library"    => $config->application->libraryDir,
       "Library\Forms"    => $config->application->libraryDir . "forms/"
    )
);

$loader->register();