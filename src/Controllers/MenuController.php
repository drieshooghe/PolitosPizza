<?php
//src/Controllers/MenuController.php

namespace PolitosPizza\Controllers;

use PolitosPizza\Models\Business\FoodListSvc;
use PolitosPizza\Models\Business\CategoryListSvc;
use PolitosPizza\Models\Business\OrderlineSvc;
use PolitosPizza\Models\Business\SearchArraySvc;
use PolitosPizza\Models\Data\FoodDAO;
use PolitosPizza\Models\Entities\FoodName;
use PolitosPizza\Models\Entities\Orderline;

class MenuController extends BaseController {

        public function menu(){
            /**
             * Loading the entire food database once, so no extra requests are required
             * starting a $_SESSION['orderlines']
             */
            if(!isset($_SESSION["foodOverview"])){
                $FoodDAO = new FoodDAO();
                $_SESSION["foodOverview"] = $FoodDAO->getFood();
            }
            if(!isset($_SESSION['orderlines'])){
                $_SESSION['orderlines'] = array();
            }
            if(isset($_GET["action"]) && $_GET["action"] == "del"){
                unset($_SESSION["orderlines"][$_GET["item"]]);
            }

            /**
             * If the request method asks to reset, the current session is unset
             * and a new session 'orderlines' is started
             */
            if(isset($_GET["process"])){
                if($_GET["process"] == "reset"){
                    unset($_SESSION["orderlines"]);
                    $_SESSION["orderlines"] = array();
                }
            }


            /**
             * If the request method is set for a foodNameId, (sizeId) and quantity
             * We look for the corresponding foodId in $_SESSION["foodOverview"]
             * these are stored in a session 'orderlines'
             * when checking out, this session is sent to the database
             */
            if(isset($_GET["id"]) && isset($_GET["quantity"])){
                $nameId = $_GET["id"];
                $qty = $_GET["quantity"];
                if(isset($_GET["sizeId"])){ $sizeId = $_GET["sizeId"]; } else { $sizeId = "1";}
                foreach ($_SESSION["foodOverview"] as $item){
                    if($item->getName()->getId() == $nameId && $item->getSize()->getId() == $sizeId){
                        $id = $item->getId();
                        $name = $item->getName()->getName();
                        $size = $item->getSize()->getSize();
                        $price = $item->getPrice();
                    }
                }
                $orderline = Orderline::create($id, $qty, $name, $size, $price);
                array_push($_SESSION['orderlines'], $orderline);
            }


            /**
             * If a $_SESSION['orderlines'] is set, assign it
             */
            if(isset($_SESSION['orderlines'])){
                $this->assign('orderlines', $_SESSION['orderlines']);
            } else {
                $this->assign('orderlines', NULL);
            }


            /**
             * Calculate total price
             */
            $totPrice = 0;
            foreach ($_SESSION['orderlines'] as $item){
                $totPrice += $item->getPrice();
            }


            $this->assign('home', getPublicPath(""));
            $this->assign('menu', getPublicPath("/menu"));

            $FoodDAO = new FoodListSvc();
            $entrees = $FoodDAO->getFoodByCatId(1);
            $pizza = $FoodDAO->getFoodByCatId(2);
            $pasta = $FoodDAO->getFoodByCatId(3);
            $dessert = $FoodDAO->getFoodByCatId(4);
            $drinks = $FoodDAO->getFoodByCatId(5);

            $this->assign('entrees', $entrees);
            $this->assign('pizza', $pizza);
            $this->assign('pasta', $pasta);
            $this->assign('dessert', $dessert);
            $this->assign('drinks', $drinks);
            $this->assign('totPrice', $totPrice);


            return $this->render('menu');

        }

}