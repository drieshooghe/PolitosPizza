<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 22/02/17
 * Time: 14:19
 */

namespace PolitosPizza\Models\Business;


use PolitosPizza\Models\Data\FoodDAO;
use PolitosPizza\Models\Entities\Orderline;

class OrderlineSvc
{

    public function startFoodListSession(){
        $FoodDAO = new FoodDAO();
        $_SESSION["foodOverview"] = $FoodDAO->getFood();
    }

    public function startOLSession(){
        $_SESSION['orderlines'] = array();
    }

    public function delOL($index){
        unset($_SESSION['orderlines'][$index]);
    }

    public function resetOLSession(){
        unset($_SESSION["orderlines"]);
        $_SESSION["orderlines"] = array();
    }

    public function calcTotal(){
        $totPrice = 0;
        foreach ($_SESSION['orderlines'] as $item){
            $totPrice += $item->getPrice();
        }
        return $totPrice;
    }

    public function addOL($nameId, $sizeId, $qty){
        foreach ($_SESSION["foodOverview"] as $item) {
            if ($item->getName()->getId() == $nameId && $item->getSize()->getId() == $sizeId) {
                $id = $item->getId();
                $name = $item->getName()->getName();
                $size = $item->getSize()->getSize();
                $price = $item->getPrice();
                $orderline = Orderline::create($id, $qty, $name, $size, $price);
                array_push($_SESSION['orderlines'], $orderline);
            }
        }
    }



}