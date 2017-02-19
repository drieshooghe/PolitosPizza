<?php
//bootstrap/bootstrap.php

require_once ("../vendor/autoload.php");
require_once ("../src/helpers.php");

$GLOBALS['path_subdomain'] = '/PolitosPizza';

session_start();

$app = new PolitosPizza\Application();
return $app;
