<?php
//src/Models/Business/CategoryListSvc.php

namespace Models\Business;
use Models\Data\CategoryDAO;
require_once __DIR__.'/../../../vendor/autoload.php';



class CategoryListSvc{

    public function getCategoryOverview(){
        $catDAO = new CategoryDAO();
        $list = $catDAO->getCategories();
        return $list;
    }

}