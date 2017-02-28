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

    public function getOrders(){
        $sql = "SELECT id, time, discount, customerId
                FROM orders
                LIMIT 20";
        $dbh = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);

        $stmt = $dbh->query($sql);
        $resultSet = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $list = array();
        $orderDAO = new OrderDAO();
        $loginDAO = new LoginDAO();
        foreach ($resultSet as $item){
            $customer = $loginDAO->getDeliveryInfo($item['customerId']);
            $orderlines = $orderDAO->getOrderLinesById($item['id']);
            $row = Order::create($item['id'], $item['time'], $item['discount'], $customer, $orderlines);
            array_push($list, $row);
        }
        $dbh = null;
        return $list;
    }

    public function getOrderLinesById($gId){
        $sql = "SELECT foodId, foodnames.name, sizes.size, quantity, food.price
                FROM orderlines
                RIGHT JOIN food ON foodId = food.id
                RIGHT JOIN foodnames ON nameId = foodnames.id
                RIGHT JOIN sizes ON sizeId = sizes.id
                WHERE orderId = :orderId";
        $dbh = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':orderId' => $gId));
        $resultSet = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $list = array();
        foreach ($resultSet as $item) {
            $row = Orderline::create($item["foodId"], $item["quantity"], $item["name"], $item["size"], $item["price"]);
            array_push($list, $row);
        }
        $dbh = null;
        return $list;
    }
}