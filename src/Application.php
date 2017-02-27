<?php
//Application.php

namespace PolitosPizza;

/**
 * bootstrap.php makes a variable $app that is an object of the Application class
 * index.php calls the function run() of that instance
 */

use PolitosPizza\Controllers\CheckoutController;
use PolitosPizza\Controllers\ConfirmationController;
use PolitosPizza\Controllers\ErrorController;
use PolitosPizza\Controllers\IndexController;
use PolitosPizza\Controllers\LoginController;
use PolitosPizza\Controllers\MenuController;
use PolitosPizza\Controllers\RegisterController;

class Application{

    /**
     * run() - execute dispatch() function outside of Application class
     *
     * Function dispatch() is protected and can therefor only be run from within the class Application
     * But the function run() is public and can run dispatch() everywhere an instance of the class Application is created
     */
    public function run(){
        $this->dispatch();
    }

    /**
     ** dispatch() - Decides which controller the user goes to.
     *
     * First the path the user is trying to access is returned, entirely stripped (see getPath()), as $path
     * Then the requestMethod (GET, HEAD, POST, PUT) is returned as $requestMethod
     *
     */
    protected function dispatch() {
        $path = $this->getPath(); /** Strip the path down */
        $requestMethod = $this->getRequestMethod(); /** Get the request method */

        /**
         * operation - Return the Controller class and the request method
         */
        list ($controllerClass, $method) = $this->getRoute($path, $requestMethod);

        /** operation - $controller is a new instance of the Controller class, that is based on the path the user is trying to reach */
        $controller = new $controllerClass();
        /** operation - Returns the given method from the respective Controller class */
        $response = $controller->$method();

        echo($response);
    }

    /**
     * getRequestMethod() - Which request method was used to access the page
     *
     * i.e. 'GET', 'HEAD', 'POST', 'PUT'.
     */
    protected function getRequestMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     ** getPath() - Get the URI the user is trying to access and strip it
     *
     * parse_url() takes a URI to perform functions on;
     *      $_SERVER[""] gives server information
     *              $_SERVER["REQUEST_URI"] gives back the URI that was given to reach the page, ex.http://www.politospizza.be/loginScreen.php
     *      PHP_URL_PATH is a parameter for "parse_url()" to get the path at the end of the URI,
     * ex. parse_url("http://www.politospizza.be/loginScreen.php", PHP_URL_PATH) => "loginScreen.php"
     */
    protected function getPath(){
        $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        /**
         * Path operations
         * With the given path in $path, we check if the path subdomain '/PolitosPizza' aka $GLOBALS['path_subdomain'] is included
         * strpos() finds the position of the first occurence of a substring in a string (first char has index 0!)
         * ex. strpos('/PolitosPizza/index.html', '/PolitosPizza') => 0, the string '/PolitosPizza' starts at the 0-nth position of  '/PolitosPizza/index.html'
         * ex. strpos('/PolitosPizza/index.html', 'PolitosPizza') => 1, the string 'PolitosPizza' starts at the 1-nth position of  '/PolitosPizza/index.html'
         *
         * Does '/PolitosPizza' reside at the 0-th position? Then the URI starts with '/PolitosPizza'
         * if that is the case we use substr(), which has two parameters: the given string (here: the URI) and the portion we want to cut off.
         * For the portion we want to cut off of the path we use strlen() which gives the length of a string, ex. strlen('abc') => 3
         * ex. strlen('/PolitosPizza') => 13
         * ex. substr('/PolitosPizza/index.html', 13) => '/index.html'
         */
        if(strpos($path, $GLOBALS['path_subdomain']) === 0){
            $path = substr($path, strlen($GLOBALS['path_subdomain']));
            /**Deletes '/PolitosPizza' from the path, if present*/
        }
        /**
         * Path operations
         * substr($path, -1) checks the latest char of the string
         * is it '/'?
         *Then we count the length of the path (strlen()), minus 1 (the '/')
         * and return this length of characters in the path with substr();
         *
         * ! We have to define the startparameter of substr() !
         * substr('index.html/', 0, strlen('index.html/') -1) => 'index.html'
         * substr('index.html/', strlen('index.html/') -1) => '/'
         */
        if(substr($path, -1) == "/"){
            $path = substr($path, 0, strlen($path) -1);
            /**Deletes '/' from the path, if present*/
        }
        return $path;
    }


    /**
     * When dispatch() is run, we input the path and request method
     * Then the getRoute function checks the path according to the request method
     * Let us say the path is '/login', then give back the class that is in the LoginController and the functionname to render the page
     * ex. return array(LoginController::class, "login") => gives back the LoginController class and its login() function
     * If the path isn't found, we return the ErrorController class and the function notFound();
     * @param $path
     * @param $requestMethod
     * @return array
     */
    protected function getRoute($path, $requestMethod) {

        if ($requestMethod ==='GET') {
            if($path === ""){
                return array(IndexController::class, "index");
            } elseif ($path === "/login"){
                return array(LoginController::class, "login");
            } elseif ($path === "/menu"){
                return array(MenuController::class, "menu");
            } elseif ($path === "/checkout"){
                return array(CheckoutController::class, "checkout");
            } elseif ($path === "/register"){
                return array(RegisterController::class, "register");
            }
        }

        elseif ($requestMethod === 'POST') {
            if ($path === "/login"){
                return array(LoginController::class, "loginCheck");
            } elseif ($path === "/register"){
                return array(RegisterController::class, "registerCheck");
            } elseif ($path === "/checkout"){
                return array(CheckoutController::class, "confirm");
            }
        }

        return array(ErrorController::class, "notFound");
    }

}