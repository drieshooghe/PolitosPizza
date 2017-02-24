<?php
//src/Models/Business/PwdSvc.php


namespace PolitosPizza\Models\Business;


class PwdSvc{

    public function setHash($gPwd){
        $hash = password_hash($gPwd, PASSWORD_DEFAULT);
        return $hash;
    }

    public function verifyPwd($pwd, $hash){
        return(password_verify($pwd, $hash));
    }


}