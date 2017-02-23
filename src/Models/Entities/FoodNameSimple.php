<?php
/**
 * Created by PhpStorm.
 * User: Cursist
 * Date: 21/02/2017
 * Time: 15:00
 */

namespace PolitosPizza\Models\Entities;


class FoodNameSimple{

    private static $idMap = array();

    private $id;
    private $name;
    private $desc;
    private $price;

    private function __construct($gId, $gName, $gDesc, $gPrice){
        $this->id = $gId;
        $this->name = $gName;
        $this->desc = $gDesc;
        $this->price = $gPrice;
    }

    public static function create($gId, $gName, $gDesc, $gPrice){
        if (!isset(self::$idMap[$gId])){
            self::$idMap[$gId] = new FoodNameSimple($gId, $gName, $gDesc, $gPrice);
        }
        return self::$idMap[$gId];
    }

    public function getId(){ return $this->id; }

    public function getName(){ return $this->name; }

    public function getDesc(){ return $this->desc; }

    public function getPrice(){ return $this->price; }

}