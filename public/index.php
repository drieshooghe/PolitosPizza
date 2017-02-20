<?php
//public/index.php
/**
 * Welcome
 * User goes to public/index.php as a single entry point
 * bootstrap.php is loaded and gives back an $app variable that is an instance of the class Application
 */
$app = require_once ("../bootstrap/bootstrap.php");

/**We use the run() function to use the dispatch() function to redirect to the controllers*/
$app->run();