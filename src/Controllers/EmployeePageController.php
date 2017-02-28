<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 27/02/17
 * Time: 16:37
 */

namespace PolitosPizza\Controllers;


use PolitosPizza\Models\Data\FoodDAO;
use PolitosPizza\Models\Data\OrderDAO;

class EmployeePageController extends BaseController
{

    public function showOrders(){

        $test = new OrderDAO();
        $tset = $test->getOrders();
        foreach ($tset as $item){
            print($item->getCustomer()->getFirstName());
        }

        $this->assign('home', getPublicPath(''));
        return $this->render('/employeepage');
    }

}