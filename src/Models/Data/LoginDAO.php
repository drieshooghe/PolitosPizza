<?php
//src/Models/Data/LoginDAO.php
namespace Models\Data;

require_once __DIR__.'/../../../vendor/autoload.php';



class LoginDAO{

    public function getPwdByUser($gUser){
        $sql = "SELECT id, userName, pwd
                FROM LoginData
                WHERE userName = :userName";
        $dbh = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':userName' => $gUser));
        $resultSet = $stmt->fetch(\PDO::FETCH_ASSOC);
        $dbh = null;
        $pwd = $resultSet["pwd"];
        return $pwd;
    }

    public function getIdByUser($gUser){
        $sql = "SELECT id, userName
                FROM LoginData
                WHERE userName = :userName";
        $dbh = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':userName' => $gUser));
        $resultSet = $stmt->fetch(\PDO::FETCH_ASSOC);
        $dbh = null;
        $id = $resultSet["id"];
        return $id;
    }
}