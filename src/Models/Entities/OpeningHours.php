<?php
/**
 * Created by PhpStorm.
 * User: Cursist
 * Date: 21/02/2017
 * Time: 8:36
 */

namespace PolitosPizza\Models\Entities;


class OpeningHours{

    private $days;

    public function __construct(){

        $this->days = array(
            1 => array(
                "id" => 1,
                "day" => "maandag",
                "starthour" => "closed",
                "endhour" => "closed"),
            2 => array(
                "id" => 1,
                "day" => "dinsdag",
                "starthour" => "17:00:00",
                "endhour" => "23:00:00"),
            3 => array(
                "id" => 3,
                "day" => "woensdag",
                "starthour" => "17:00:00",
                "endhour" => "23:00:00"),
            4 => array(
                "id" => 4,
                "day" => "donderdag",
                "starthour" => "17:00:00",
                "endhour" => "23:00:00"),
            5 => array(
                "id" => 5,
                "day" => "vrijdag",
                "starthour" => "17:00:00",
                "endhour" => "23:30:00"),
            6 => array(
                "id" => 6,
                "day" => "zaterdag",
                "starthour" => "11:00:00",
                "endhour" => "23:30:00"),
            7 => array(
                "id" => 7,
                "day" => "zondag",
                "starthour" => "11:00:00",
                "endhour" => "23:30:00")
        );

    }

    public function getHoursByDay($gDay){
        return $this->days[$gDay];
    }

}
