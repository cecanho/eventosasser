<?php
    //$shadow = require_once 'shadow.php';

    return array(
        //
        // parāmetros gerais para a app
        'title'     => 'Eventos Asser',

        //
        // parāmetros gerais para o banco de dados
        'dbname'    => 'eventosa_1sem2016',
        'dsn'       => "mysql:host=localhost;dbname=eventosa_1sem2016",
        'dbuser'    => 'root',//minutum($shadow['u']),
        'dbpass'    => '123456'//minutum($shadow['p'])
    );