<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 16/02/17
 * Time: 15:09
 */

namespace PolitosPizza\Models\Business;
use PolitosPizza\Models\Data\LoginDAO;
require_once __DIR__.'/../../../vendor/autoload.php';

class LoginSvc{

    public function checkPwd($email, $pwd){
        $login = new LoginDAO();
        if ($login->getPwdByEmail($email) == $pwd){
            return true;
        } else {
            return false;
        }
    }

    public function getId($user){
        $login = new LoginDAO();
        $id = $login->getIdByEmail($user);
        return $id;
    }
}