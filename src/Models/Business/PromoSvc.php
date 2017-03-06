<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 6/03/17
 * Time: 9:26
 */

namespace PolitosPizza\Models\Business;


class PromoSvc
{

    public function getPromo($a, $b, $c){
        $nr = rand(1,3);
        if($nr == 1){ return $a; }
        elseif($nr == 2){ return $b; }
        elseif($nr == 3){ return $c; }
    }

}