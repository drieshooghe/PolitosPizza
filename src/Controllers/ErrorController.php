<?php

namespace PolitosPizza\Controllers;


class ErrorController extends BaseController
{

    public function notFound() {
        return $this->render('404');
    }

}