<?php
//src/Models/Data/OpeningDAO.php

namespace PolitosPizza\Models\Data;

class OpeningDAO{

    public function getOpeningStatus(){
        $sql = "SELECT starthour, endhour
                FROM Opening
                WHERE id = :dayNr";
        $dbh = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':dayNr' => date('N')));
        $resultSet = $stmt->fetch(\PDO::FETCH_ASSOC);
        $dbh = null;
        $now = date('H:i:s');
        if($now > $resultSet["starthour"] && $now < $resultSet["endhour"]){
            return "open";
        } else {
            return "closed";
        }
    }
}



