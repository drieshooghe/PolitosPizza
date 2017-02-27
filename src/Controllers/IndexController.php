<?php
//src/Controllers/IndexController.php

namespace PolitosPizza\Controllers;

use PolitosPizza\Models\Business\OpeningSvc;
use PolitosPizza\Models\Data\FoodDAO;
use PolitosPizza\Models\Data\LoginDAO;
use PolitosPizza\Models\Data\OrderDAO;
use PolitosPizza\Models\Entities\DeliveryLine;

class IndexController extends BaseController {

    public function index(){
        $_SESSION["RegSrc"] = "index";

        if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
                $this->assign('loginValue', 'Afmelden');
            } else {
                $this->assign('loginValue', 'Aanmelden');
            }

        $hours = new OpeningSvc();
        $status = $hours->getStatus();

        $this->assign('home', getPublicPath(""));
        $this->assign('login', getPublicPath("/login"));
        $this->assign('status', $status);
        $this->assign('menu', getPublicPath("/menu"));

        return $this->render('index');



    }


}