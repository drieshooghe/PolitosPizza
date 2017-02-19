<?php
//Application.php

namespace PolitosPizza;

//Bootstrap.php maakt Application aan
//index.php roept run van Application aan

use PolitosPizza\Controllers\ErrorController;
use PolitosPizza\Controllers\LoginController;

class Application
{
    public function run(){
        $this->dispatch();
    }

    protected function dispatch() { //Dispatcher beslist welke controllers uitgestuurd worden
        $path = $this->getPath(); //Haalt path op
        $requestMethod = $this->getRequestMethod();

        list ($controllerClass, $method) = $this->getRoute($path, $requestMethod); //Geef mij de juiste route voor path

        $controller = new $controllerClass(); //Maak een nieuwe instantie van de class die in die variabele zit
        $response = $controller->$method(); //Roep de methode die ik kreeg op

        echo($response);
    }

    protected function getRequestMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }

    protected function getPath(){ //Haalt schwanz uit path
        $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        if(strpos($path, $GLOBALS['path_subdomain']) === 0){
            $path = substr($path, strlen($GLOBALS['path_subdomain'])); //Verwijdert PolitosPizza/, neemt direct directory eronder
        }
        if(substr($path, -1) == "/"){
            $path = substr($path, 0, strlen($path) -1); //Is laatste karakter = /, verwijder het
        }
        return $path;
    }



    protected function getRoute($path, $requestMethod) { // TODO: Alle controllers toevoegen

        if ($requestMethod ==='GET') { // GET requests
            if($path === ""){
                echo("index");
            } elseif ($path === "/login"){
                return array(LoginController::class, "login");
            }
        }

        elseif ($requestMethod === 'POST') { // POST requests
            if ($path === "/login"){
                return array(LoginController::class, "loginCheck");
            }
        }

        return array(ErrorController::class, "notFound");
    }

}