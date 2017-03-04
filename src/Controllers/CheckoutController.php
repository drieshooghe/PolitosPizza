<?php
//src/Controllers/IndexController.php

namespace PolitosPizza\Controllers;

use PolitosPizza\Models\Business\DeliveryInfoSvc;
use PolitosPizza\Models\Business\DiscountSvc;
use PolitosPizza\Models\Business\OrderlineSvc;
use PolitosPizza\Models\Data\OrderDAO;

class CheckoutController extends BaseController {

    public function checkout(){

        if($_SESSION['orderlines'] == null){
            $this->redirect('/menu');
        }

        /**
        * Calculate total price
        */
            $OLS = new OrderlineSvc();
            $totPrice = $OLS->calcTotal();

        /**
         * Calculate discount
         */
            $discountSvc = new DiscountSvc();
            $discount = $discountSvc->getDiscounts();
            $_SESSION['discount'] = round($totPrice*(1-$discount),2);


            /**
         * Get delivery info
        */
        $client = new DeliveryInfoSvc();
        $info = $client->getDeliveryInfo($_SESSION["custId"]);
        $firstName = $info->getFirstName();
        $famName = $info->getFamName();
        $adres = $info->getAdres();
        $postCode = $info->getPostCode();
        $town = $info->getTown();
        $deliveryPrice = $info->getDeliveryPrice();
        $deliverable = $info->getDeliverable();

        /**
         * Other variables
         */
        $orderlines = $_SESSION["orderlines"];
        $discountPerc = (1-$discount)*100;
        $totPrice =round(($totPrice*$discount)+$deliveryPrice, 2);

        $this->assign('home', getPublicPath(""));
        $this->assign('menu', getPublicPath("/menu"));
        $this->assign('confirm', getPublicPath("/confirm"));

        $this->assign('orderlines', $orderlines);
        $this->assign('discount', $discountPerc);
        $this->assign('town', $town);
        $this->assign('deliverable', $deliverable);
        $this->assign('delivery', $deliveryPrice);
        $this->assign('totPrice', $totPrice);
        $this->assign('korting', $discount);

        $this->assign('firstName', $firstName);
        $this->assign('famName', $famName);
        $this->assign('adres', $adres);
        $this->assign('postCode', $postCode);
        $this->assign('town', $town);


        $this->assign('back', getPublicPath("/order"));
        $this->assign('confirm', getPublicPath("/confirmation"));

        return $this->render('checkout');


    }

    public function confirm(){

        if(!empty($_SESSION['orderlines']) && isset($_SESSION['custId'])){
            $order = new OrderDAO();
            $order->addOrder($_SESSION['discount'], $_SESSION['custId'], $_SESSION['orderlines']);
            unset($_SESSION['discount']);
            unset($_SESSION['orderlines']);
            $_SESSION['placedorder'] = true;
            $this->redirect('');
        }

    }


}