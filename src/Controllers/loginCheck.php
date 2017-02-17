<?php
//src/Controllers/loginCheck.php

session_start();

require_once __DIR__.'/../../vendor/autoload.php';

$login = new \Models\Business\LoginSvc();
if($login->checkPwd($_POST["user"], $_POST["pwd"]) == true){
    header("location: orderScreen.php");
    $_SESSION["customerId"] = $login->getId($_POST["user"]); //Hier slaan we meteen de customerId op in een session om bij de afrekening de klantgegevens te kunnen opvragen.
    $_SESSION["loggedIn"] = true;
} else {
    $_SESSION["wrongpwd"] = true; //Hier wordt in een session opgeslagen dat het pwd verkeerd is, in showLoginScreen verschijnt dan dat de gegevens verkeerd zijn en wordt de session unsset.
    header("location: showLoginScreen.php");
    exit(0);
}