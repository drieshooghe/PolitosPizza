<?php
//src/Controllers/login.php

namespace Controllers;

session_start();

require_once __DIR__.'/../../vendor/autoload.php';

//Als de gebruiker teruggestuurd werd naar showLoginScreen.php wegens het invullen van een verkeerd wachtwoord komt deze melding er op.
if(isset($_SESSION["wrongpwd"]) AND $_SESSION["wrongpwd"] == true){
    print("Uw gebruikersnaam en/of wachtwoord is verkeerd");
    unset($_SESSION["wrongpwd"]);
}

include ("../Views/Presentation/login.php");