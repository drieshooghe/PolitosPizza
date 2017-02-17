<?php
//src/Models/Business/FoodListSvc.php
namespace Models\Business;
use Models\Data\FoodDAO;
require_once __DIR__.'/../../../vendor/autoload.php';


class FoodListSvc{

    public function getFoodOverview(){
        $foodDAO = new FoodDAO();
        $list = $foodDAO->getFood();
        return $list;
    }

    public function getFoodByCatId($cat){
        $foodDAO = new FoodDAO();
        $list = $foodDAO->getFoodByCatId($cat);
        return $list;
    }

}