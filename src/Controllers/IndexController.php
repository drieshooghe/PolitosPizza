<?php
//src/Controllers/IndexController.php

namespace PolitosPizza\Controllers;

use \Models\Business;

class IndexController extends BaseController {

    public function index(){

        $this->assign('home', getPublicPath(""));
        $this->assign('login', getPublicPath("/login"));

        return $this->render('index');
    }



}
