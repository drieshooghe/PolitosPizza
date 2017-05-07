<?php
//src/Controllers/MenuController.php

namespace PolitosPizza\Controllers;

use PolitosPizza\Models\Business\FoodListSvc;
use PolitosPizza\Models\Business\OpeningSvc;
use PolitosPizza\Models\Business\OrderlineSvc;
use PolitosPizza\Models\Data\FoodDAO;
use PolitosPizza\Models\Entities\Orderline;

class MenuController extends BaseController {

        public function menu(){

            /**
             * Loading the entire food database once, so no extra requests are required
             */
            if(!isset($_SESSION["foodOverview"])){
                $OLS = new OrderlineSvc();
                $OLS->startFoodListSession();
            }

            /** Start OLSession if not started */
            if(!isset($_SESSION['orderlines'])){
                $OLS = new OrderlineSvc();
                $OLS->startOLSession();
            }

            /**
             * If the request method asks to reset, the current session is unset
             * and a new session 'orderlines' is started
             */
            if(isset($_GET["action"])){
                if($_GET["action"] == "del"){
                    $OLS = new OrderlineSvc();
                    $OLS->delOL($_GET["item"]);
                }
                if($_GET["action"] == "reset"){
                    $OLS = new OrderlineSvc();
                    $OLS->resetOLSession();
                }
                if($_GET["action"] == "bestellen"){
                    if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
                        $this->redirect('/checkout');
                    } else {
                        $_SESSION["RegSrc"] = "order";
                        $_SESSION["loginSrc"] = "orderMenu";
                        $this->redirect('/login');
                    }
                }
            }

            /**
             * If the request method is set for a foodNameId, (sizeId) and quantity
             * We look for the corresponding foodId in $_SESSION["foodOverview"]
             * these are stored in a session 'orderlines'
             * when checking out, this session is sent to the database
             */
            if(isset($_GET["id"]) && isset($_GET["quantity"])){
                if($_GET["quantity"] > 0){
                    if(isset($_GET["sizeId"])){ $sizeId = $_GET["sizeId"]; } else { $sizeId = "1";}
                    $OLS = new OrderlineSvc();
                    $OLS->addOL($_GET["id"], $sizeId, $_GET["quantity"]);
                }
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
            $OLS = new OrderlineSvc();
            $totPrice = $OLS->calcTotal();


            $hours = new OpeningSvc();
            $status = $hours->getStatus();

            $this->assign('home', getPublicPath("/"));
            $this->assign('login', getPublicPath("/login"));
            $this->assign('status', $status);
            $this->assign('menu', getPublicPath("/menu"));
            $this->assign('info', getPublicPath("/info"));
            if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
                $this->assign('loginValue', 'Afmelden');
            } else {
                $this->assign('loginValue', 'Aanmelden');
            }


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
