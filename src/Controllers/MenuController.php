<?php
//src/Controllers/ShowMenu.php
namespace PolitosPizza\Controllers;

use Models\Business\CategoryListSvc;
require '../../vendor/autoload.php';

session_start();

$cat = new CategoryListSvc();
$list = $cat->getCategoryOverview();
include("../Views/Presentation/menu.php");