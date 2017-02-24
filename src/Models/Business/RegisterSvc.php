<?php
//src/Models/Business/RegisterSvc.php

namespace PolitosPizza\Models\Business;


class RegisterSvc
{

    public function startLoginFormSession($firstN, $famN, $street, $number, $postCode, $town, $phoneNr, $mobileNr){
        $_SESSION["loginForm"] = array(
            'firstName' => $firstN,
            'famName' => $famN,
            'street' => $street,
            'number' => $number,
            'postCode' => $postCode,
            'town' => $town,
            'phoneNr' => $phoneNr,
            'mobileNr' => $mobileNr
        );
        return $_SESSION["loginForm"];
    }

    public function stopLoginFormSession(){
        unset($_SESSION["loginForm"]);
    }

    public function checkCredentials($array){
        $exceptions = array();

        if(empty($array["firstName"])){
            $exceptions["FirstNameEmpty"] = 'Gelieve een voornaam in te vullen';
        } elseif(!ctype_alpha($array["firstName"])){
            $exceptions["FirstNameNotAlfa"] = 'Gelieve een geldige voornaam in te vullen';
        }

        if(empty($array["famName"])){
            $exceptions["FamNameEmpty"] = 'Gelieve een familienaam in te vullen';
        } elseif(!ctype_alpha($array["famName"])){
            $exceptions["FamNameNotAlfa"] = 'Gelieve een geldige familienaam in te vullen';
        }

        if(empty($array["street"])){
            $exceptions["StreetEmpty"] = 'Gelieve een straat in te vullen';
        } elseif(!is_string($array["street"])){
            $exceptions["StreetNotString"] = 'Gelieve een geldige straatnaam in te vullen';
        }

        if(empty($array["number"])){
            $exceptions["HouseNumberEmpty"] = 'Gelieve een huisnummer in te vullen';
        } elseif(!is_string($array["number"])){
            $exceptions["HouseNumberNotString"] = 'Gelieve een geldig huisnummer in te vullen';
        }

        if(empty($array["postCode"])){
            $exceptions["PostCodeEmpty"] = 'Gelieve een postcode in te vullen';
        } elseif(!is_numeric($array["postCode"])){
            $exceptions["PostCodeNotNum"] = 'Gelieve een geldige postcode in te vullen';
        }

        if(empty($array["town"])){
            $exceptions["TownEmpty"] = 'Gelieve een gemeente in te vullen';
        } elseif(!ctype_alpha($array["town"])){
            $exceptions["townNotAlfa"] = 'Gelieve een geldige gemeente in te vullen';
        }

        if(!is_string($array["phoneNr"])){
            $exceptions["PhoneNrNotString"] = 'Gelieve een geldig telefoonnummer in te vullen';
        }

        if(!is_string($array["mobileNr"])){
            $exceptions["MobileNrNotString"] = 'Gelieve een geldig gsm nummer in te vullen';
        }

        if(empty($array["phoneNr"]) && empty($array["mobileNr"])){
            $exceptions["ZeroNumbersGiven"] = 'Gelieve minstens één gsm- of telefoonnummer in te geven';
        }

        return $exceptions;
    }

    public function checkLoginValues($email, $pwd1, $pwd2){
        $exceptions = array();

        if($pwd1 !== $pwd2){
            $exceptions["PwdMatch"] = 'Gelieve twee keer hetzelfde wachtwoord in te vullen';
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $exceptions["CorrectEmail"] = 'Gelieve een geldig e-mailadres in te vullen';
        }

        return $exceptions;

    }

}