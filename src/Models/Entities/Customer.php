<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 16/02/17
 * Time: 15:35
 */

namespace PolitosPizza\Models\Entities;


class Customer
{

    private static $idMap = array();

    private $id;
    private $firstName;
    private $famName;
    private $adres;
    private $placeId;
    private $phoneNr;
    private $mobileNr;
    private $emailAdres;

    public function __construct($gId, $gFirstName, $gFamName, $gAdres, $gPlaceId, $gPhoneNr, $gMobileNr, $gEmailAdres){
        $this->id = $gId;
        $this->firstName = $gFirstName;
        $this->famName = $gFamName;
        $this->adres = $gAdres;
        $this->placeId = $gPlaceId;
        $this->phoneNr = $gPhoneNr;
        $this->mobileNr = $gMobileNr;
        $this->emailAdres = $gEmailAdres;
    }

    public static function create($gId, $gFirstName, $gFamName, $gAdres, $gPlaceId, $gPhoneNr, $gMobileNr, $gEmailAdres){
        if (!isset(self::$idMap[$gId])){
            self::$idMap[$gId] = new Customer($gId, $gFirstName, $gFamName, $gAdres, $gPlaceId, $gPhoneNr, $gMobileNr, $gEmailAdres);
        }
        return self::$idMap[$gId];
    }

    public function getId(){ return $this->id; }

    public function getFirstName(){ return $this->firstName; }

    public function getFamName(){ return $this->famName; }

    public function getAdres(){ return $this->adres; }

    public function getPlaceId(){ return $this->placeId; }

    public function getPhoneNr(){ return $this->phoneNr; }

    public function getMobileNr(){ return $this->mobileNr; }

    public function getEmailAdres(){ return $this->emailAdres; }

    public function setFirstName($gFirstName){ $this->firstName = $gFirstName; }

    public function setFamName($gFamName){ $this->famName =$gFamName; }

    public function setAdres($gAdres){ $this->adres = $gAdres; }

    public function setPlaceId($gPlaceId){ $this->placeId = $gPlaceId; }

    public function setPhoneNr($gPhoneNr){ $this->phoneNr = $gPhoneNr; }

    public function setMobileNr($gMobileNr){ $this->mobileNr = $gMobileNr; }

    public function setEmailAdres($gEmailAdres){ $this->emailAdres = $gEmailAdres; }

}