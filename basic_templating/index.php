<?php
    require_once(__DIR__ . '/base/Router.php');
    require_once(__DIR__ . '/base/DbConfig.php');

    require_once(__DIR__ . '/custom/database/BsDatabase.php');

    define("__ROOT__", __DIR__);
    $cfg = new DbConfig();
    $cfg->setHostname('localhost')
        ->setPort(3306)
        ->setCredentials('dbadmin', 'dbadmin')
        ->setSchema('theater');

    $router = new Router();
    $router
        ->registerDbWrapper('bs', new BsDbWrapper($cfg));

    $wrapper = new IDbWrapper($cfg);
    $con = $wrapper->getConnection();

    
