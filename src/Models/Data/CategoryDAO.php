<?php
//src/Models/Data/CategoryDAO.php
namespace PolitosPizza\Models\Data;

use PDO;
use PolitosPizza\Models\Entities\Category;

class CategoryDAO{

    public function getCategories(){
        $sql = "SELECT id, category
                FROM politospizza.foodcat
                ORDER BY id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);

        $stmt = $dbh->query($sql);
        $resultSet = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $list = array();
        foreach ($resultSet as $item){
            $row = Category::create($item["id"], $item["category"]);
            array_push($list, $row);
        }
        $dbh = null;
        return $list;
    }

}