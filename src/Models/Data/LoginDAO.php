<?php
//src/Models/Data/LoginDAO.php
namespace Models\Data;

require_once __DIR__.'/../../../vendor/autoload.php';



class LoginDAO{

    public function getPwdByEmail($gEmail){
        $sql = "SELECT pwd
                FROM customers, logindata
                WHERE email = :gEmail AND loginId = logindata.id";
        $dbh = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':gEmail' => $gEmail));
        $resultSet = $stmt->fetch(\PDO::FETCH_ASSOC);
        $dbh = null;
        $pwd = $resultSet["pwd"];
        return $pwd;
    }

    public function getIdByEmail($gEmail){
        $sql = "SELECT customers.id
                FROM customers, logindata
                WHERE email = :gEmail AND loginId = logindata.id";
        $dbh = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':gEmail' => $gEmail));
        $resultSet = $stmt->fetch(\PDO::FETCH_ASSOC);
        $dbh = null;
        $id = $resultSet["id"];
        return $id;
    }
}

$test = new LoginDAO();
$tset = $test->getIdByEmail("dries.hooghe@outlook.com");
var_dump($tset);