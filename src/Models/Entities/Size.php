<?php
//src/Models/Entities/Size.php;
namespace PolitosPizza\Models\Entities;


class Size
{
    private static $idMap = array();

    private $id;
    private $size;

    private function __construct($gId, $gSize){
        $this->id = $gId;
        $this->size = $gSize;
    }

    public static function create($gId, $gSize){
        if (!isset(self::$idMap[$gId])){
            self::$idMap[$gId] = new Size($gId, $gSize);
        }
        return self::$idMap[$gId];
    }

    public function getId(){ return $this->id; }

    public function getSize(){ return $this->size; }

    public function setSize($gSize){ $this->size = $gSize; }

}