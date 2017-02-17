<?php
//src/Controllers/loginCheck.php

session_start();

require_once __DIR__.'/../../vendor/autoload.php';

$login = new \Models\Business\LoginSvc();
if($login->checkPwd($_POST["email"], $_POST["pwd"]) == true){
    $_SESSION["customerId"] = $login->getId($_POST["email"]); //Hier slaan we meteen de customerId op in een session om bij de afrekening de klantgegevens te kunnen opvragen.
    $_SESSION["loggedIn"] = true;
    setcookie("custEmail", $_POST["email"], time()+2678400);
    if(isset($_GET["src"]) && $_GET["src"] == "index"){
        header("location: showIndex.php");
        exit(0);
    } else {
        header("location: showSummary.php");
        exit(0);
    }
} else {
    header("location: showLoginScreen.php?error=wrongpwd");
    exit(0);
}