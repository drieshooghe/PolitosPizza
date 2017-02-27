<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 27/02/17
 * Time: 11:43
 */

namespace PolitosPizza\Models\Business;


use PolitosPizza\Models\Data\LoginDAO;

class DeliveryInfoSvc
{

    public function getDeliveryInfo($user){
        $loginDAO = new LoginDAO();
        $info = $loginDAO->getDeliveryInfo($user);
        return $info;
    }

}