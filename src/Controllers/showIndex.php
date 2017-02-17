<?php
//src/Controllers/showIndex.php
namespace Controllers;
use Models\Business\OpeningSvc;

require_once __DIR__.'/../../vendor/autoload.php';

session_start();
date_default_timezone_set("Europe/Brussels");

$opening = new OpeningSvc();
$status = $opening->getStatus();

if(isset($_GET["login"]) && $_GET["login"] == "off"){
    unset($_SESSION["loggedIn"]);
}

if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
    $loginStatus = "Afmelden";
    $loginLink = "showIndex.php?login=off";
} else {
    $loginStatus = "Aanmelden";
    $loginLink = "showLoginScreen.php?src=index";
}


include("../Views/Presentation/index.php");