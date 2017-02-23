<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 16/02/17
 * Time: 15:09
 */

namespace PolitosPizza\Models\Business;
use PolitosPizza\Models\Data\LoginDAO;

class LoginSvc{

    public function checkPwd($email, $pwd){
        $loginDAO = new LoginDAO();
        $check = $loginDAO->getPwdByEmail($email);
        $hash = $pwd;
        $answer = $loginDAO->verifyPwd($hash, $check);
        return $answer;
    }

    public function getId($user){
        $login = new LoginDAO();
        $id = $login->getIdByEmail($user);
        return $id;
    }


}