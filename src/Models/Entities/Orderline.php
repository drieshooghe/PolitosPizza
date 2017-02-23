<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 22/02/17
 * Time: 14:21
 */

namespace PolitosPizza\Models\Entities;


class Orderline{

    private static $idMap = array();

    private $line = array();

    private function __construct($gFoodId, $gQuantity, $gFoodName, $gFoodSize, $gPrice){
        $this->line = array(
            'foodId' => $gFoodId,
            'quantity' => $gQuantity,
            'foodName' => $gFoodName,
            'foodSize' => $gFoodSize,
            'price' => ($gQuantity*$gPrice)
        );
    }

    public static function create($gFoodId, $gQuantity, $gFoodName, $gFoodSize, $gPrice){
        if (!isset(self::$idMap[$gFoodId])){
            self::$idMap[$gFoodId] = new Orderline($gFoodId, $gQuantity, $gFoodName, $gFoodSize, $gPrice);
        }
        return self::$idMap[$gFoodId];
    }

    public function getFoodId(){ return $this->line["foodId"]; }

    public function getQuantity(){ return $this->line["quantity"]; }

    public function getName(){ return $this->line["foodName"]; }

    public function getSize(){ return $this->line["foodSize"]; }

    public function getPrice(){ return $this->line["price"]; }

}