<?php
//src/Models/Entities/Food.php;
namespace PolitosPizza\Models\Entities;


class Food{

    private static $idMap = array();

    private $id;
    private $name;
    private $size;
    private $category;
    private $price;


    public function __construct($gId, $gName, $gSize, $gCat, $gPrice){
        $this->id = $gId;
        $this->name = $gName;
        $this->price = $gPrice;
        $this->category = $gCat;
        $this->size = $gSize;
    }

    public static function create($gId, $gName, $gSize, $gCat, $gPrice){
        if (!isset(self::$idMap[$gId])){
            self::$idMap[$gId] = new Food($gId, $gName, $gSize, $gCat, $gPrice);
        }
        return self::$idMap[$gId];
    }

    public function getId(){ return $this->id; }

    public function getName(){ return $this->name; }

    public function getSize(){ return $this->size; }

    public function getPrice(){ return $this->price; }

    public function getCategory(){ return $this->category; }

    public function setName($gName){ $this->name = $gName; }

    public function setPrice($gPrice){ $this->price = $gPrice; }

    public function setCategory($gCat){ $this->category = $gCat; }

}