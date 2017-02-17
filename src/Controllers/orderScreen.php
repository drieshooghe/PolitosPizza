<?php

namespace Controllers;
use Models\Business\CategoryListSvc;
use Models\Business\FoodListSvc;

require_once __DIR__.'/../../vendor/autoload.php';

$categories = new CategoryListSvc();
$catList = $categories->getCategoryOverview();
$dish = new FoodListSvc();
include ("../Views/Presentation/order.php");