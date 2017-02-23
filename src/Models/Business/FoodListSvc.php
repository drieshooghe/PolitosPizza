<?php
//src/Models/Business/FoodListSvc.php
namespace PolitosPizza\Models\Business;
use PolitosPizza\Models\Data\FoodDAO;


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

    public function getFoodNameByCatId($cat){
        $foodDAO = new FoodDAO();
        $list = $foodDAO->getFoodNameByCatId($cat);
        return $list;
    }


}