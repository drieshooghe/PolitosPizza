<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 27/02/17
 * Time: 14:45
 */

namespace PolitosPizza\Controllers;


use PolitosPizza\Models\Data\OrderDAO;

class ConfirmationController
{
    public function confirm(){

        if(!empty($_SESSION['orderlines']) && isset($_SESSION['custId'])){
            $order = new OrderDAO();
            $order->addOrder($_SESSION['discount'], $_SESSION['custId'], $_SESSION['orderlines']);
            unset($_SESSION['discount']);
            unset($_SESSION['custId']);
            unset($_SESSION['orderlines']);

        }

    }

}