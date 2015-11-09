<?php
    $shadow = require_once 'shadow.php';

    return array(
        //
        // parāmetros gerais para a app
        'title'     => 'Eventos Asser',

        //
        // parāmetros gerais para o banco de dados
        'dbname'    => 'eventsis',
        'dsn'       => "mysql:host=localhost;dbname=eventsis",
        'dbuser'    => minutum($shadow['u']),
        'dbpass'    => minutum($shadow['p'])
    );