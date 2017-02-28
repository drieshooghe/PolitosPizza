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

    private function __construct($gOrderId, $gTime, $gDiscount, $gCustomer, $gOrderlines){
        $this->line = array(
            'orderId' => $gOrderId,
            'time' => $gTime,
            'discount' => $gDiscount,
            'customer' => $gCustomer,
            'orderlines' => $gOrderlines
        );
    }

    public static function create($gOrderId, $gTime, $gDiscount, $gCustomer, $gOrderlines){
        if (!isset(self::$idMap[$gOrderId])){
            self::$idMap[$gOrderId] = new Order($gOrderId, $gTime, $gDiscount, $gCustomer, $gOrderlines);
        }
        return self::$idMap[$gOrderId];
    }

    public function getId(){ return $this->line["orderId"]; }

    public function getTime(){ return $this->line["time"]; }

    public function getDiscount(){ return $this->line["discount"]; }

    public function getCustomer(){ return $this->line["customer"]; }

    public function getOrderlines(){ return $this->line["orderlines"]; }


}