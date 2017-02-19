<?php
//src/Controllers/showOrder.php
namespace Controllers;

require_once __DIR__.'/../../vendor/autoload.php';


session_start();

if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false){
    header("location: showLoginScreen.php");
    exit(0);
}

include ("../Views/Presentation/summary.php");