<?php
require("./../src/config.php");

use Steampixel\Route;

Route::add('/', function(){
    echo "Działa";
});

Route::run('/swiezutkieMemy/pub');

?>