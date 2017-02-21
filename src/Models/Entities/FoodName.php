<?php
/**
 * Created by PhpStorm.
 * User: Cursist
 * Date: 21/02/2017
 * Time: 15:00
 */

namespace PolitosPizza\Models\Entities;


class FoodName{

    private static $idMap = array();

    private $id;
    private $name;
    private $desc;

    private function __construct($gId, $gName, $gDesc){
        $this->id = $gId;
        $this->name = $gName;
        $this->desc = $gDesc;
    }

    public static function create($gId, $gName, $gDesc){
        if (!isset(self::$idMap[$gId])){
            self::$idMap[$gId] = new FoodName($gId, $gName, $gDesc);
        }
        return self::$idMap[$gId];
    }

    public function getId(){ return $this->id; }

    public function getName(){ return $this->name; }

    public function getDesc(){ return $this->desc; }

}