<?php
//src/Models/Business/OpeningSvc.php
namespace Models\Business;
use Models\Data\OpeningDAO;
require_once __DIR__.'/../../../vendor/autoload.php';


class OpeningSvc{

    public function getStatus()
    {
        $openingDAO = new OpeningDAO();
        $status = $openingDAO->getOpeningStatus();
        return $status;
    }
}