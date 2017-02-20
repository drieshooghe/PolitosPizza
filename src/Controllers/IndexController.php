<?php
//src/Controllers/IndexController.php

namespace PolitosPizza\Controllers;

use PolitosPizza\Models\Business\OpeningSvc;

class IndexController extends BaseController {

    public function index(){

        $this->assign('home', getPublicPath(""));
        $this->assign('login', getPublicPath("/login"));

        return $this->render('index');
    }



}

$test = new OpeningSvc();
$tset = $test->getStatus();
var_dump($tset);