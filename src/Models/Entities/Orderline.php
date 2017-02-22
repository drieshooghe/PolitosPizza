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

    private function __construct($gFoodId, $gQuantity){
        $this->line = array(
            'foodId' => $gFoodId,
            'quantity' => $gQuantity
        );
    }

    public static function create($gFoodId, $gQuantity){
        if (!isset(self::$idMap[$gFoodId])){
            self::$idMap[$gFoodId] = new Orderline($gFoodId, $gQuantity);
        }
        return self::$idMap[$gFoodId];
    }

    public function getFoodId(){ return $this->line["foodId"]; }

    public function getQuantity(){ return $this->line["quantity"]; }

}