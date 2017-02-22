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

    private $line = array();

    public function setOrderLine($gNameId, $gSizeId, $gQuantity){
        $foodDAO = new FoodDAO();
        $gFoodId = $foodDAO->getIdForOrderLine($gNameId, $gSizeId);
        $this->line = Orderline::create($gFoodId, $gQuantity);
    }

    public function getOrderLine(){
        $return = $line->getLine
    }
}