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

    /*public function getFoodNameOverview(){
        $foodDAO = new FoodDAO();
        $list = $foodDAO->getFood();
        $names = array();
        foreach ($list as $item){
            $row = $item->getName()->getName();
            array_push($names, $row);
        }
        return $names;
    }*/

}