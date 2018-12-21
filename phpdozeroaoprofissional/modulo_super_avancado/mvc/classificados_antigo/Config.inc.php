<?php
    require 'environment.php';

    $config = array();

    if(ENVIRONMENT == 'development') {
        define('BASE_URL', 'http://localhost/courses/phpdozeroaoprofissional/modulo_super_avancado/mvc/classificados_antigo/');
        $config['dbname'] = 'classificados';
        $config['dbhost'] = 'localhost';
        $config['dbuser'] = 'root';
        $config['dbpass'] = '';
    } else { 
        define('BASE_URL', '');
        $config['dbname'] = '';
        $config['dbhost'] = '';
        $config['dbuser'] = '';
        $config['dbpass'] = '';
    }


    global $db;

    try {
        $db = new PDO("mysql:dbname=" . $config['dbname'] . ";host=". $config['dbhost'], $config['dbuser'], $config['dbpass']);
    } catch(PDOException $e) {
        echo "ERRO: " . $e -> getMessage();
        exit;
    }




?>