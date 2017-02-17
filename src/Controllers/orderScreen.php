<?php

namespace Controllers;
use Models\Business\CategoryListSvc;
use Models\Business\FoodListSvc;

require_once __DIR__.'/../../vendor/autoload.php';

if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
    $loginLink = "showSummary.php";
} else {
    $loginLink = "showLoginScreen.php?src=order";
}

$categories = new CategoryListSvc();
$catList = $categories->getCategoryOverview();
$dishes = new FoodListSvc();

include ("../Views/Presentation/order.php");

