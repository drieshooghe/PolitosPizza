<?php
//src/Controllers/IndexController.php

namespace PolitosPizza\Controllers;

use PolitosPizza\Models\Business\OrderlineSvc;

class CheckoutController extends BaseController {

    public function checkout(){
        /**
        * Calculate total price
        */
            $OLS = new OrderlineSvc();
            $totPrice = $OLS->calcTotal();

        $this->assign('home', getPublicPath(""));

        $this->assign('orderlines', $_SESSION['orderlines']);
        $this->assign('totPrice', $totPrice);

        return $this->render('checkout');


    }


}