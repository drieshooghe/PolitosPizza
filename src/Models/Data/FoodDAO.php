<?php
//src/Models/Data/FoodDAO.php
namespace Models\Data;

use Models\Entities\Size;
use Models\Data\DBConfig;
use Models\Entities\Category;
use Models\Entities\Food;

require_once __DIR__.'/../../../vendor/autoload.php';


class FoodDAO{

    public function getFood(){
        $sql = "SELECT Food.id, name, sizeId, size, catId, category, price
                FROM politospizza.Food, politospizza.FoodCat, politospizza.Sizes
                WHERE Food.catId = FoodCat.id AND Food.sizeId = Sizes.id";
        $dbh = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);

        $stmt = $dbh->query($sql);
        $resultSet = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $list = array();
        foreach ($resultSet as $item){
            $size = Size::create($item["sizeId"], $item["size"]);
            $category = Category::create($item["catId"], $item["category"]);
            $row = Food::create($item["id"], $item["name"], $size, $category, $item["price"]);
            array_push($list, $row);
        }
        $dbh = null;
        return $list;
    }

    public function getFoodByCatId($gId){
        $sql = "SELECT Food.id, name, sizeId, size, catId, category, price
                FROM politospizza.Food, politospizza.FoodCat, politospizza.Sizes
                WHERE Food.catId = FoodCat.id AND Food.catId = :id AND Food.sizeId = Sizes.id";
        $dbh = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $gId));
        $resultSet = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $list = array();
        foreach ($resultSet as $item) {
            $size = Size::create($item["sizeId"], $item["size"]);
            $category = Category::create($item["catId"], $item["category"]);
            $row = Food::create($item["id"], $item["name"], $size, $category, $item["price"]);
            array_push($list, $row);
        }
        $dbh = null;
        return $list;
    }

}