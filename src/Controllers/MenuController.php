<?php
//src/Controllers/MenuController.php

namespace PolitosPizza\Controllers;

use PolitosPizza\Models\Business\FoodListSvc;
use PolitosPizza\Models\Business\CategoryListSvc;

class MenuController extends BaseController {

    public function menu(){

        $this->assign('home', getPublicPath(""));

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

        return $this->render('menu');

    }

}