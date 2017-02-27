<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 27/02/17
 * Time: 13:43
 */

namespace PolitosPizza\Models\Data;
use PolitosPizza\Models\Entities\Order;
use PolitosPizza\Models\Entities\Orderline;

date_default_timezone_set("Europe/Brussels");


class OrderDAO
{
    public function addOrder($gDiscount, $gCustomerId, $orderlineArray){
        $sql = "INSERT INTO orders (time, discount, customerId)
                VALUES(:tijd, :discount, :customerId)";
        $dbh = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':tijd' => date('Y-m-d H:i:s'), ':discount' => $gDiscount, ':customerId' => $gCustomerId));
        $orderId = $dbh->lastInsertId();

        $sql = "INSERT INTO orderlines(foodId, quantity, orderId)
                VALUES(:foodId, :quantity, :orderId)";

        foreach ($orderlineArray as $item){
            $stmt = $dbh->prepare($sql);
            $foodId = $item->getFoodId();
            $qty = $item->getQuantity();
            $stmt->execute(array(':foodId' => $foodId, ':quantity' => $qty, ':orderId' => $orderId));
        }
        $dbh = null;
    }
}