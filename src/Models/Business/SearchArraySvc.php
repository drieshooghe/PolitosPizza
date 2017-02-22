<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 22/02/17
 * Time: 16:25
 */

namespace PolitosPizza\Models\Business;


class SearchArraySvc
{

    public function getArrayId($array, $key1, $key2)
    {
        foreach ($array as $item) {
            if (($item->getName()->getId() == $key1) && ($item->getSize()->getId() == $key2)) {
                return $item->getId();
            }

        }

    }
}