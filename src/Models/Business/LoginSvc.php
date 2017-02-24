<?php
//src/Models/Business/LoginSvc.php


namespace PolitosPizza\Models\Business;
use PolitosPizza\Models\Data\LoginDAO;

class LoginSvc{

    public function checkPwd($email, $pwd){
        $loginDAO = new LoginDAO();
        $pwdSvc = new PwdSvc();
        $check = $loginDAO->getPwdByEmail($email);
        $hash = $pwd;
        $answer = $pwdSvc->verifyPwd($hash, $check);
        return $answer;
    }

    public function getId($user){
        $login = new LoginDAO();
        $id = $login->getIdByEmail($user);
        return $id;
    }


}