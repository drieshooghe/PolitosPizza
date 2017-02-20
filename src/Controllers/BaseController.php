<?php

namespace PolitosPizza\Controllers;

/**
 * Class BaseController
 * @package PolitosPizza\Controllers
 *
 * All controllers should extend the BaseController class.
 * The BaseController is also stored in the Controllers directory, and may be used as a place to put shared controller logic.
 * Now, we can route to this controller action like so:
 * Route::get('user/{id}', 'UserController@showProfile');
 *
 * This class contains all functions every controller makes use of (hence the name 'BaseController')
 *
 */
class BaseController
{
    /**
     * construct()
     *
     * All functions (assign, render,...) are given back in an instance of the class as an array, on which we can perform $this->function
     * ex.  LoginController is an instance
     *      $this->assign('custEmail', 'user@example.com') puts the dummy emailadress in a variable $custEmail for the login template
     *      $this->render('login') gives back the template for "login", which is ../src/Views/Presentation/login.php
     *      $this->redirect($path) redirects to the given path and exits the code
     */
    public function __construct() {
        $this->renderAssigns = [];
    }

    /**
     * assign($key, $value)
     *
     * Suppose we make a Controller for a certain page ex. LoginController (which extends BaseController like all controllers should)
     * with login.php as its View.
     * On login.php we have an input box (ex. E-mail) where we want to show a dummy e-mail.
     * Then, in the Controller, we can simply make a function wherein we say $this->assign($key, $value)
     * ex.  public function login(){
     *      $this->assign('custEmail', 'user@example.com');
     * Then in the View we can simply type <input type="text" name="email" value="<?php print($assigns['custEmail']);?>" required="required">
     */
    protected function assign($key, $value) { // Assign a value to a specific key for usage in the templates
        $this->renderAssigns[$key] = $value;
    }
    /**
     * render($template)
     *
     * Renders the given template name
     */
    protected function render($template) { // This renders the given template and provides the given assigns
        $assigns = $this->renderAssigns;

        return include("../src/Views/Presentation/" . $template . ".php");
    }

    protected function redirect($path) { // Redirects to the given path and exits the code
        header("location: " . $GLOBALS['path_subdomain'] . $path);
        exit(0);
    }
}