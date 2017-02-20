<?php
//src/Controllers/IndexController.php

namespace PolitosPizza\Controllers;

use PolitosPizza\Models\Business\OpeningSvc;

class IndexController extends BaseController {

    public function index(){
        //phpinfo();

        $hours = new OpeningSvc();
        $status = $hours->getStatus();

        $this->assign('home', getPublicPath(""));
        $this->assign('login', getPublicPath("/login"));
        $this->assign('status', $status);

        return $this->render('index');
    }

}