<?php
//src/Models/Data/FoodDAO.php
namespace PolitosPizza\Models\Data;

use PolitosPizza\Models\Entities\FoodNameSimple;
use PolitosPizza\Models\Entities\Size;
use PolitosPizza\Models\Data\DBConfig;
use PolitosPizza\Models\Entities\Category;
use PolitosPizza\Models\Entities\Food;
use PolitosPizza\Models\Entities\FoodName;

require_once __DIR__.'/../../../vendor/autoload.php';

/**
 * NO CAPS IN SQL QUERIES!
 */

class FoodDAO{

    public function getFood(){
        $sql = "SELECT food.id, nameId, foodnames.name, foodnames.description, sizeId, sizes.size, catId, foodcat.category, price
                FROM  politospizza.food, 
                      politospizza.foodnames,
                      politospizza.sizes,
                      politospizza.foodcat
                WHERE nameId = foodnames.id  AND sizeId = sizes.id AND catId = foodcat.id
                ORDER BY catId, id";
        $dbh = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);

        $stmt = $dbh->query($sql);
        $resultSet = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $list = array();
        foreach ($resultSet as $item){
            $size = Size::create($item["sizeId"], $item["size"]);
            $category = Category::create($item["catId"], $item["category"]);
            $name = FoodName::create($item["nameId"], $item["name"], $item["description"]);
            $row = Food::create($item["id"], $name, $size, $category, $item["price"]);
            array_push($list, $row);
        }
        $dbh = null;
        return $list;
    }

    /* public function getFoodByCatId($gId){
        $sql = "SELECT food.id, nameId, foodnames.name, foodnames.description, sizeId, sizes.size, catId, foodcat.category, price
                FROM  politospizza.food, 
                      politospizza.foodnames,
                      politospizza.sizes,
                      politospizza.foodcat
                WHERE nameId = foodnames.id  AND sizeId = sizes.id AND catId = foodcat.id AND catId = :id
                ORDER BY catId, id";
        $dbh = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $gId));
        $resultSet = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $list = array();
        foreach ($resultSet as $item) {
            $size = Size::create($item["sizeId"], $item["size"]);
            $category = Category::create($item["catId"], $item["category"]);
            $name = FoodName::create($item["nameId"], $item["name"], $item["description"]);
            $row = Food::create($item["id"], $name, $size, $category, $item["price"]);
            array_push($list, $row);
        }
        $dbh = null;
        return $list;
    }*/

    public function getFoodNameByCatId($gCatId){
        $sql = "SELECT DISTINCT food.nameId, foodnames.name, foodnames.description, food.catId
                FROM food, foodnames, foodcat
                WHERE catId = :id AND foodnames.id = food.nameId AND foodcat.id = food.catId
                ORDER BY foodnames.id";

        $dbh = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $gCatId));
        $resultSet = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $list = array();
        foreach ($resultSet as $item) {
            $row = FoodNameSimple::create($item["nameId"], $item["name"], $item["description"], $gCatId);
            array_push($list, $row);
        }
        $dbh = null;
        return $list;
    }

}
