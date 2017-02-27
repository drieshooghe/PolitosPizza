<?php
//src/Models/Business/PwdSvc.php


namespace PolitosPizza\Models\Business;


class PwdSvc{

    public function setHash($gPwd){
        $options = [
            'salt' => uniqid(mt_rand(), true),
            'cost' => 12
        ];
        $hash = password_hash($gPwd, PASSWORD_DEFAULT, $options);
        return $hash;
    }

    public function verifyPwd($pwd, $hash){
        return(password_verify($pwd, $hash));
    }


}