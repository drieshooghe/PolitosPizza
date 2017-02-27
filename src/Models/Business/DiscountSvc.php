<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 27/02/17
 * Time: 9:56
 */

namespace PolitosPizza\Models\Business;


class DiscountSvc
{

    public function getDiscounts(){
         switch (date('N')){

             case 1:    return "0.90";
                        break;
             case 2:    return "0.85";
                        break;
             case 3:    return "1";
                        break;
             case 4:    return "1";
                        break;
             case 5:    return "1";
                        break;
             case 6:    return "1";
                        break;
             case 7:    return "1";
                        break;
         }
    }


}