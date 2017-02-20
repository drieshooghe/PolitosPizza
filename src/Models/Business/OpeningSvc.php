<?php
//src/Models/Business/OpeningSvc.php
namespace PolitosPizza\Models\Business;

use PolitosPizza\Models\Data\OpeningDAO;

class OpeningSvc{

    public function getStatus()
    {
        $openingDAO = new OpeningDAO();
        $status = $openingDAO->getOpeningStatus();
        return $status;
    }
}