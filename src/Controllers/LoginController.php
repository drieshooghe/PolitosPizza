<?php
//src/Controllers/login.php

namespace PolitosPizza\Controllers;

class LoginController extends BaseController {

    public function login(){
        $this->assign('home', getPublicPath(""));
        if (isset($_COOKIE["custEmail"])){
            $this->assign('custEmail', $_COOKIE['cutEmail']);
        } else {
            $this->assign('custEmail', "Vul hier uw emailadres in");
        }

        return $this->render('login');

    }

    public function loginCheck() {
        // TODO: log in the user
        // TODO: check the session for HTTP_REFERRER and redirect to it. If not exists, go to ...
    }

}

/*
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
*/