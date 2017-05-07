<?php
//bootstrap/bootstrap.php
/**
 * Users go to public/index.php, where this file is loaded
 * bootstrap.php in its turn uses autoload.php, the helperclasses
 * and starts a session.
 * (This causes every page to be equipped with the autoloader and the helper classes)
 * It starts a session
 * Defines a variable (path_subdomain) that is accessible everywhere
 * and makes an instance of the Application class that is returned to index.php
 */
require_once ("../vendor/autoload.php");
require_once ("../src/helpers.php");
require_once ("../vendor/twig/twig/lib/Twig/Loader/Filesystem.php");

$GLOBALS['path_subdomain'] = '';

session_start();

date_default_timezone_set('Europe/Brussels');

$app = new PolitosPizza\Application();
return $app;

