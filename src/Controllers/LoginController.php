<?php
//src/Controllers/login.php

namespace PolitosPizza\Controllers;

use PolitosPizza\Models\Business\LoginSvc;

class LoginController extends BaseController {

    public function login(){ //When request method GET is detected

        $this->assign('home', getPublicPath("")); //Path to home
        $this->assign('login', getPublicPath("/login"));
        $this->assign('register', getPublicPath("/register"));

        /** If a cookie is detected for the customer's email, give it to the view */
        if (isset($_COOKIE["custEmail"])){
            $this->assign('custEmail', $_COOKIE['custEmail']);
        } else {
            $this->assign('custEmail', "Vul hier uw emailadres in");
        }

        /** If users get to this page, even though they're logged in, they want to log out*/
        if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
            unset($_SESSION["loggedIn"]);
            unset($_SESSION["custId"]);
            unset($_SESSION["orderlines"]);
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
        // TODO: encrypt Pwd

        $this->assign('home', getPublicPath(""));

        $login = new LoginSvc();
        $check = $login->checkPwd($_POST["email"], $_POST["pwd"]);

        if($check == true){
            $login = new LoginSvc();
            $_SESSION["custId"] = $login->getId($_POST["email"]);
            $_SESSION["loggedIn"] = true;
            setcookie("custEmail", $_POST['email'], time()+2678400);

            if(isset($_SESSION["loginSrc"]) && $_SESSION["loginSrc"] == "orderMenu"){
                unset($_SESSION["loginSrc"]);
                return $this->redirect('/checkout');//If the user came from order && pwd == true, take him to checkout
            } else {
                return $this->redirect(''); //If the user came from anywhere but order && pwd == true, take him to index
            }

        } elseif ($check == false) {
            $_SESSION["wrongPwd"] = true;
            return $this->redirect('/login'); //Render the login page

        }
    }
}