<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 16/02/17
 * Time: 15:09
 */

namespace Models\Business;
use Models\Data\LoginDAO;
require_once __DIR__.'/../../../vendor/autoload.php';

class LoginSvc{

    public function checkPwd($user, $pwd){
        $login = new LoginDAO();
        if ($login->getPwdByUser($user) == $pwd){
            return true;
        } else {
            return false;
        }
    }

    public function getId($user){
        $login = new LoginDAO();
        $id = $login->getIdByUser($user);
        return $id;
    }
}