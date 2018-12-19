<?php
    session_start();

    require 'Config.inc.php';

    spl_autoload_register(function($class){
        if(file_exists('controllers/' . $class . '.class.php')) {
            require 'controllers/' . $class . '.class.php';
        } else if(file_exists('models/' . $class . '.class.php')) {
            require 'models/' . $class . '.class.php'; 
        } else if(file_exists('core/' . $class . '.class.php')) {
            require 'core/' . $class . '.class.php';
        }
    });


    $core = new Core();
    $core -> start();