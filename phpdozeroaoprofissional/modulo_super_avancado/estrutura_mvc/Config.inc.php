<?php

    require 'environment.php';

    if(ENVIRONMENT == 'development') {
        define("BASE_URL", "http://localhost/courses/phpdozeroaoprofissional/modulo_super_avancado/estrutura_mvc/");

        $config['dbname'] = 'estrutura_mvc';
        $config['dbhost'] = 'localhost';
        $config['dbuser'] = 'root';
        $config['dbpass'] = '';

    } else {
        define("BASE_URL", "http://www.takeandpay.com.br");
        $config['dbname'] = 'estrutura_mvc';
        $config['dbhost'] = 'localhost';
        $config['dbuser'] = 'root';
        $config['dbpass'] = '';
    }


    global $db;
try {
    $db = new PDO("mysql:dbname=" . $config['dbname'] . ";host=" . $config['dbhost'], $config['dbuser'], $config['dbpass']);

} catch(PDOException $e) {
    echo "ERRO: " . $e -> getMessage();
    exit;
}


?>