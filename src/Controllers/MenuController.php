<?php
//src/Controllers/MenuController.php

namespace PolitosPizza\Controllers;

use Models\Business\FoodListSvc;
use PolitosPizza\Models\Business\CategoryListSvc;

class MenuController extends BaseController {

    public function menu(){

        $this->assign('home', getPublicPath(""));


        $catInst = new CategoryListSvc();
        $categories = $catInst->getCategoryOverview();
        $this->assign('category', $categories);
        $foodInst = new FoodListSvc();
        $food = $foodInst->getFoodOverview();
        var_dump($food);
        $food2 = $foodInst->getFoodByCatId(2);
        var_dump($food2);

        return $this->render('menu');

    }

}