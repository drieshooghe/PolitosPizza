<?php
//src/Controllers/login.php

namespace Controllers;

session_start();

require_once __DIR__.'/../../vendor/autoload.php';

if(!empty($_GET["src"])){
    $src = $_GET["src"];
} else {
    $src = "";
}

if(!empty($_GET["error"]) && $_GET["error"] == "wrongpwd"){
    $error = true;
}

if(isset($_SESSION["loggedIn"]) AND $_SESSION["loggedIn"] == true){
    header("location: showSummary.php");
    exit(0);
}

if (isset($_COOKIE["custEmail"])){
    $custEmail = $_COOKIE["custEmail"];
} else {
    $custEmail = "";
}

include ("../Views/Presentation/login.php");