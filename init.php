<?php

global $loader;
global $plugins;

$loader->addPsr4('Acme\\MyStats\\', __DIR__ . '/src/');

$plugins[] = [
    Acme\MyStats\Plugin::NAME,
    '\Acme\MyStats\MyStatsPluginServiceProvider',
];