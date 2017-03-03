<?php
//src/Controllers/IndexController.php

namespace PolitosPizza\Controllers;

use PolitosPizza\Models\Business\OpeningSvc;


class IndexController extends BaseController {

    public function index(){

        $_SESSION["RegSrc"] = "index";
        if(isset($_SESSION['employee'])){
            unset($_SESSION['employee']);
        }

        if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
                $this->assign('loginValue', 'afmelden');
            } else {
                $this->assign('loginValue', 'aanmelden');
            }

        if(isset($_SESSION['placedorder'])){
            $this->assign('placedorder', 'Bedankt voor uw bestelling!');
            unset($_SESSION['placedorder']);
        } else {
            $this->assign('placedorder', '');
        }

        $hours = new OpeningSvc();
        $status = $hours->getStatus();

        $this->assign('home', getPublicPath(""));
        $this->assign('login', getPublicPath("/login"));
        $this->assign('status', $status);
        $this->assign('menu', getPublicPath("/menu"));
        $this->assign('info', getPublicPath("/info"));

        return $this->render('index');



    }


}