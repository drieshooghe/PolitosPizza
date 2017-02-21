<?php
//src/Models/Business/CategoryListSvc.php

namespace PolitosPizza\Models\Business;

use PolitosPizza\Models\Data\CategoryDAO;

class CategoryListSvc{

    public function getCategoryOverview(){
        $catDAO = new CategoryDAO();
        $list = $catDAO->getCategories();
        return $list;
    }

}