<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 22/02/17
 * Time: 14:21
 */

namespace PolitosPizza\Models\Entities;


class Order{

    private static $idMap = array();

    private $line = array();

    private function __construct($gOrderId, $gTime, $gDiscount, $gCustomerId){
        $this->line = array(
            'orderId' => $gOrderId,
            'time' => $gTime,
            'discount' => $gDiscount,
            'customerId' => $gCustomerId
        );
    }

    public static function create($gOrderId, $gTime, $gDiscount, $gCustomerId){
        if (!isset(self::$idMap[$gOrderId])){
            self::$idMap[$gOrderId] = new Order($gOrderId, $gTime, $gDiscount, $gCustomerId);
        }
        return self::$idMap[$gOrderId];
    }

    public function getId(){ return $this->line["orderId"]; }

    public function getTime(){ return $this->line["time"]; }

    public function getDiscount(){ return $this->line["discount"]; }

    public function getCustomerId(){ return $this->line["customerId"]; }


}