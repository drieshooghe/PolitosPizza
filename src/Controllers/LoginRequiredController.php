<?php

namespace PolitosPizza\Controllers;


class LoginRequiredController extends BaseController
{
    public function __construct() {
        parent::__construct();

        if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] == false) {
            // TODO: Save $_SERVER('HTTP_REFERER') in session
            $this->redirect('/login');
        }
    }
}