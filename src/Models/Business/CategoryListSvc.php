<?php
//src/Models/Business/CategoryListSvc.php

namespace PolitosPizza\Models\Business;
use PolitosPizza\Models\Data\CategoryDAO;
require_once __DIR__.'/../../../vendor/autoload.php';



class CategoryListSvc{

    public function getCategoryOverview(){
        $catDAO = new CategoryDAO();
        $list = $catDAO->getCategories();
        return $list;
    }

}