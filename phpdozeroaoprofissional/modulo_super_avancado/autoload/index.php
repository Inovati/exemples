<?php
    spl_autoload_register(function($class){

        require 'class/' . $class . '.class.php';
    });

    
    $horse = new Cavalo();
    $horse -> falar();

    $person = new Pessoa();
    $person -> falar();
?>