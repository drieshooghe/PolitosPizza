<?php
//src/Controllers/login.php

namespace PolitosPizza\Controllers;

use PolitosPizza\Models\Business\LoginSvc;

class LoginController extends BaseController {

    public function login(){ //When request method GET is detected

        $this->assign('home', getPublicPath("")); //Path to home
        $this->assign('login', getPublicPath("/login"));

        /** If a cookie is detected for the customer's email, give it to the view */
        if (isset($_COOKIE["custEmail"])){
            $this->assign('custEmail', $_COOKIE['custEmail']);
        } else {
            $this->assign('custEmail', "Vul hier uw emailadres in");
        }

        /** If users get to this page, even though they're logged in, they want to log out*/
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
            unset($_SESSION["loggedIn"]);
            $this->redirect('');
        }

        if(isset($_SESSION["wrongPwd"]) && $_SESSION["wrongPwd"] == true){
            $this->assign('wrongPwd', true);
        } else {
            $this->assign('wrongPwd', false);
        }
        unset($_SESSION["wrongPwd"]);

        return $this->render('login'); //Render the login page

    }

    public function loginCheck() { //When request method POST is detected
        // TODO: log in the user

        $this->assign('home', getPublicPath(""));

        $login = new LoginSvc();
        $check = $login->checkPwd($_POST["email"], $_POST["pwd"]);

        if($check == true){
            $_SESSION["loggedIn"] = true;
            setcookie("custEmail", $_POST['email'], time()+2678400);

            $path = parse_url($_SERVER["HTTP_REFERER"], PHP_URL_PATH);
            $path = substr($path, 0, strlen($path) -1);
            if($path == "/menu"){
                return $this->redirect('/checkout'); //If the user came from order && pwd == true, take him to checkout
            } else {
                return $this->redirect(''); //If the user came from anywhere but order && pwd == true, take him to index
            }

        } elseif ($check == false) {
            $_SESSION["wrongPwd"] = true;
            return $this->redirect('/login'); //Render the login page

        }

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