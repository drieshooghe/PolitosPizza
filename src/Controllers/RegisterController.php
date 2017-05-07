<?php
//src/Controllers/RegisterController.php
namespace PolitosPizza\Controllers;
use PolitosPizza\Models\Business\LoginSvc;
use PolitosPizza\Models\Business\RegisterSvc;
use PolitosPizza\Models\Data\LoginDAO;
class RegisterController extends BaseController {

    public function register(){ //When request method GET is detected
        $this->assign('home', getPublicPath("/")); //Path to home
        $this->assign('firstName', "");
        $this->assign('famName', "");
        $this->assign('street', "");
        $this->assign('number', "");
        $this->assign('postCode', "");
        $this->assign('town', "");
        $this->assign('phoneNr', "");
        $this->assign('mobileNr', "");
        $this->assign('login', getPublicPath("/login"));
        $this->assign('menu', getPublicPath("/menu"));
        $this->assign('info', getPublicPath("/info"));

        return $this->render("register");
    }
    public function registerCheck(){//When request method POST is detected
        $registerSvc = new RegisterSvc();
        $registerSvc->startLoginFormSession($_POST["firstName"], $_POST["famName"], $_POST["street"], $_POST["number"], $_POST["postCode"], $_POST["town"], $_POST["phoneNr"], $_POST["mobileNr"]);
        $this->assign('firstName', $_SESSION["loginForm"]['firstName']);
        $this->assign('famName', $_SESSION["loginForm"]['famName']);
        $this->assign('street', $_SESSION["loginForm"]["street"]);
        $this->assign('number', $_SESSION["loginForm"]["number"]);
        $this->assign('postCode', $_SESSION["loginForm"]["postCode"]);
        $this->assign('town', $_SESSION["loginForm"]["town"]);
        $this->assign('phoneNr', $_SESSION["loginForm"]["phoneNr"]);
        $this->assign('mobileNr', $_SESSION["loginForm"]["mobileNr"]);
        $RegError = $registerSvc->checkCredentials($_SESSION["loginForm"]);
        $this->assign('RegError', $RegError);
        $LoginErr = $registerSvc->checkLoginValues($_POST["email"], $_POST["pwd"], $_POST["pwd2"]);
        $this->assign('LoginErr', $LoginErr);
        if($RegError == null && $LoginErr == null){
            $adres = $_POST["street"]." ".$_POST["number"];
            $loginDAO = new LoginDAO();
            $succes = $loginDAO->addUser($_POST["firstName"], $_POST["famName"], $adres, $_POST["postCode"], $_POST["town"], $_POST["phoneNr"], $_POST["mobileNr"], $_POST["email"], $_POST["pwd"]);
            if($succes == true){
                $login = new LoginSvc();
                $_SESSION["custId"] = $login->getId($_POST["email"]);
                $_SESSION["loggedIn"] = true;
                $registerSvc->stopLoginFormSession();
            }
            $_SESSION["loggedIn"] = true;
            if(isset($_SESSION["RegSrc"]) && $_SESSION["RegSrc"] == "index") {
                unset($_SESSION["RegSrc"]);
                $this->redirect('/');
            } elseif($_SESSION["RegSrc"] == "order") {
                unset($_SESSION["RegSrc"]);
                $this->redirect('/checkout');
            }
        } else {
            return $this->render("register");
        }
    }
}
