<?php
//src/Models/Entities/Category.php;
namespace PolitosPizza\Models\Entities;


class Category{

    private static $idMap = array();

    private $id;
    private $category;

    private function __construct($gId, $gCat){
        $this->id = $gId;
        $this->category = $gCat;
    }

    public static function create($gId, $gCat){
        if (!isset(self::$idMap[$gId])){
            self::$idMap[$gId] = new Category($gId, $gCat);
        }
        return self::$idMap[$gId];
    }

    public function getId(){ return $this->id; }

    public function getCategory(){ return $this->category; }

    public function setCategory($gCat){ $this->category = $gCat; }
}