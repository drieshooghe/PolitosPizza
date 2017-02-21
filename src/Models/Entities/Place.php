<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 16/02/17
 * Time: 15:48
 */

namespace PolitosPizza\Models\Entities;


class Place
{
    private static $idMap = array();

    private $placeId;
    private $postCode;
    private $town;
    private $deliveryNr;

    private function __construct($gPlaceId, $gPostCode, $gTown, $gDeliveryNr){
        $this->placeId = $gPlaceId;
        $this->postCode = $gPostCode;
        $this->town = $gTown;
        $this->deliveryNr = $gDeliveryNr;
    }

    public function getPlaceId(){ return $this->placeId; }

    public function getPostCode(){ return $this->postCode; }

    public function getTown(){ return $this->town; }

    public function getDeliveryNr(){ return $this->deliveryNr; }

}