<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 27/02/17
 * Time: 10:27
 */

namespace PolitosPizza\Models\Entities;


class DeliveryLine
{
    private static $idMap = array();

    private $id;
    private $firstName;
    private $famName;
    private $adres;
    private $postCode;
    private $town;
    public $deliveryPrice;

    private function __construct($gId, $gFirstName, $gFamName, $gAdres, $gPostCode, $gTown, $gDeliveryPrice){
    $this->id = $gId;
    $this->firstName = $gFirstName;
    $this->famName = $gFamName;
    $this->adres = $gAdres;
    $this->postCode = $gPostCode;
    $this->town = $gTown;
    $this->deliveryPrice = $gDeliveryPrice;
}

    public static function create($gId, $gFirstName, $gFamName, $gAdres, $gPostCode, $gTown, $gDeliveryPrice){
    if (!isset(self::$idMap[$gId])){
        self::$idMap[$gId] = new DeliveryLine($gId, $gFirstName, $gFamName, $gAdres, $gPostCode, $gTown, $gDeliveryPrice);
    }
    return self::$idMap[$gId];
}

    public function getId(){ return $this->id; }

    public function getFirstName(){ return $this->firstName; }

    public function getFamName(){ return $this->famName; }

    public function getAdres(){ return $this->adres; }

    public function getPostCode(){ return $this->postCode; }

    public function getTown(){ return $this->town; }

    public function getDeliveryPrice(){ return $this->deliveryPrice; }

}