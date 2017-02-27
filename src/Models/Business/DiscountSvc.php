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

             case 1:    $discount = 0.9;
                        break;
             case 2:    $discount = 0.85;
                        break;
             case 3:    $discount = 1;
                        break;
             case 4:    $discount = 1;
                        break;
             case 5:    $discount = 1;
                        break;
             case 6:    $discount = 1;
                        break;
             case 7:    $discount = 1;
                        break;
         }
         return $discount;
    }


}