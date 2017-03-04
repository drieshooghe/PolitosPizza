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
    private $phoneNr;
    private $mobileNr;
    private $deliveryNr;
    public $deliveryPrice;

    private function __construct($gId, $gFirstName, $gFamName, $gAdres, $gPostCode, $gTown, $gPhoneNr, $gMobileNr, $deliveryNr, $gDeliveryPrice){
    $this->id = $gId;
    $this->firstName = $gFirstName;
    $this->famName = $gFamName;
    $this->adres = $gAdres;
    $this->postCode = $gPostCode;
    $this->town = $gTown;
    $this->phoneNr = $gPhoneNr;
    $this->mobileNr = $gMobileNr;
    $this->deliveryNr = $deliveryNr;
    $this->deliveryPrice = $gDeliveryPrice;
}

    public static function create($gId, $gFirstName, $gFamName, $gAdres, $gPostCode, $gTown, $gPhoneNr, $gMobileNr,$deliveryNr, $gDeliveryPrice){
    if (!isset(self::$idMap[$gId])){
        self::$idMap[$gId] = new DeliveryLine($gId, $gFirstName, $gFamName, $gAdres, $gPostCode, $gTown, $gPhoneNr, $gMobileNr, $deliveryNr, $gDeliveryPrice);
    }
    return self::$idMap[$gId];
}

    public function getId(){ return $this->id; }

    public function getFirstName(){ return $this->firstName; }

    public function getFamName(){ return $this->famName; }

    public function getAdres(){ return $this->adres; }

    public function getPostCode(){ return $this->postCode; }

    public function getTown(){ return $this->town; }

    public function getPhoneNr(){ return $this->phoneNr;}

    public function getMobileNr(){ return $this->mobileNr;}

    public function getDeliveryNr(){ return $this->deliveryNr; }

    public function getDeliveryPrice(){ return $this->deliveryPrice; }

    public function getDeliverable(){ return $this->deliveryNr !== 0; }

}