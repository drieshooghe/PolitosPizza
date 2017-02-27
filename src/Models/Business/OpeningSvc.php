<?php
//src/Models/Business/OpeningSvc.php
namespace PolitosPizza\Models\Business;

use PolitosPizza\Models\Entities\OpeningHours;
use PolitosPizza\Models\Data\OpeningDAO;

class OpeningSvc{

    public function getStatus()
    {
        $allHours = new OpeningHours();
        $hours = $allHours->getHoursByDay(date('N'));
        $now = date('H:i:s');
        if($now > $hours["starthour"] && $now < $hours["endhour"]){
            return "open";
        } else {
            return "closed";
        }
    }
}