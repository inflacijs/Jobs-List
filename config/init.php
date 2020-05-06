<?php
//Session start
session_start();
//Config file
require_once 'config.php';

//Include Helpers

require_once 'helpers/system_helper.php';
// Autoloader. Helps to call any class from lib folder, without requiring or including

function __autoload($class_name){   
    require_once 'lib/' . $class_name . '.php';

}

