<?php
//src/Controllers/IndexController.php

namespace PolitosPizza\Controllers;

class InfoController extends BaseController {

    public function showInfo(){

        $this->assign('home', getPublicPath(""));
        $this->assign('login', getPublicPath("/login"));
        $this->assign('menu', getPublicPath("/menu"));
        $this->assign('employeepage', getPublicPath("/employeepage"));
        $this->assign('info', getPublicPath("/info"));

        return $this->render('info');



    }


}