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

        if(!isset($_SESSION['employee'])){
            $this->redirect('/');
        }

        $orderDAO = new OrderDAO();
        $orders = $orderDAO->getOrders();
        $this->assign('orders', $orders);


        $this->assign('home', getPublicPath('/'));
        return $this->render('/employeepage');
    }

}
