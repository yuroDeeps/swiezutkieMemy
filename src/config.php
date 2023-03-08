<?php 
    require("./../vendor/autoload.php");

    $db = new mysqli('localhost', 'root', '', 'memy');

    $loader = new Twig\Loader\FilesystemLoader('./../src/templates');

    $twig = new Twig\Environment($loader);

?>