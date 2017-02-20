<?php
//src/Models/Business/OpeningSvc.php
namespace Models\Business;
use Models\Data\OpeningDAO;


class OpeningSvc{

    public function getStatus()
    {
        $openingDAO = new OpeningDAO();
        $status = $openingDAO->getOpeningStatus();
        return $status;
    }
}