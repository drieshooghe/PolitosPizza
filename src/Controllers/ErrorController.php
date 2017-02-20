<?php

namespace PolitosPizza\Controllers;


class ErrorController extends BaseController
{

    public function notFound() {
        return '<h1 style="font-family: Arial">404</h1></br>
                <p style="font-family: Arial">De door u opgevraagde pagina werd niet gevonden</p>';
    }

}