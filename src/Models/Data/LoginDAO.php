<?php
//src/Models/Data/LoginDAO.php
namespace PolitosPizza\Models\Data;

use PolitosPizza\Models\Business\PwdSvc;

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

    public function getPlaceId($gPostCode, $gTown){
        $sql = "SELECT placeId
                FROM places
                WHERE places.postCode = :code AND places.town = :town";
        $dbh = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':code' => $gPostCode, ':town' => strtoupper ($gTown)));
        $result = $stmt->fetch();
        return $result["placeId"];
    }

    public function addUser($gFirstName, $gFamName, $gAdres, $gPostCode, $gTown, $gPhone, $gMobile, $gEmail, $gPwd){

        $loginDAO = new LoginDAO();
        $pwdSvc = new PwdSvc();
        $placeId = $loginDAO->getPlaceId($gPostCode, $gTown);
        $hashword = $pwdSvc->setHash($gPwd);

        $sql = "INSERT INTO logindata (pwd) VALUES(:pwd)";
        $dbh = new \PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PWD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':pwd' => $hashword));
        $loginId = $dbh->lastInsertId();

        $sql = "INSERT INTO customers (firstName, famName, adres, placeId, phoneNr, mobileNr, email, loginId)
                VALUES (:firstN, :famName, :adres, :placeId, :phone, :mobile, :email, :login)";

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(   ':firstN' => $gFirstName,
                                ':famName' => $gFamName,
                                ':adres' => $gAdres,
                                ':placeId' => $placeId,
                                ':phone' => $gPhone,
                                ':mobile' => $gMobile,
                                ':email' => $gEmail,
                                ':login' => $loginId));
        $dbh = null;
        return $succes = true;
    }

}