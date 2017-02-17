<?php
//src/Controllers/ShowDishes.php
namespace Controllers;
use Models\Business\FoodListSvc;
require_once __DIR__.'/../../vendor/autoload.php';


$dish = new FoodListSvc();
$list = $dish->getFoodByCatId($_GET["dish"]);
include("../Views/Presentation/dishes.php");