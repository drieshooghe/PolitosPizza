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
             */
            if(!isset($_SESSION["foodOverview"])){
                $FoodDAO = new FoodDAO();
                $_SESSION["foodOverview"] = $FoodDAO->getFood();
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
                    $foodId = $item->getId();
                    }
                }
               $line = Orderline::create($foodId, $qty);
               array_push($_SESSION['orderlines'], $line);
            }

            $this->assign('home', getPublicPath(""));
            $this->assign('menu', getPublicPath("/menu"));

            $FoodDAO = new FoodListSvc();
            $entrees = $FoodDAO->getFoodNameByCatId(1);
            $pizza = $FoodDAO->getFoodNameByCatId(2);
            $pasta = $FoodDAO->getFoodNameByCatId(3);
            $dessert = $FoodDAO->getFoodNameByCatId(4);
            $drinks = $FoodDAO->getFoodNameByCatId(5);

            $this->assign('entrees', $entrees);
            $this->assign('pizza', $pizza);
            $this->assign('pasta', $pasta);
            $this->assign('dessert', $dessert);
            $this->assign('drinks', $drinks);

            return $this->render('menu');

        }

}