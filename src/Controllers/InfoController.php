<?php
//src/Controllers/IndexController.php

namespace PolitosPizza\Controllers;

use PolitosPizza\Models\Business\OpeningSvc;

class InfoController extends BaseController {

    public function showInfo(){

        $hours = new OpeningSvc();
        $status = $hours->getStatus();

        $this->assign('home', getPublicPath(""));
        $this->assign('login', getPublicPath("/login"));
        $this->assign('status', $status);
        $this->assign('menu', getPublicPath("/menu"));
        $this->assign('info', getPublicPath("/info"));
        if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
            $this->assign('loginValue', 'Afmelden');
        } else {
            $this->assign('loginValue', 'Aanmelden');
        }

        return $this->render('info');



    }


}