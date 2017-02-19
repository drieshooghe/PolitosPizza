<?php

namespace PolitosPizza\Controllers;


class BaseController
{
    public function __construct() {
        // Make an associative array with all the values used in the templates
        $this->renderAssigns = [];
    }

    protected function assign($key, $value) { // Assign a value to a specific key for usage in the templates
        $this->renderAssigns[$key] = $value;
    }

    protected function render($template) { // This renders the given template and provides the given assigns
        $assigns = $this->renderAssigns;

        return include("../src/Views/Presentation/" . $template . ".php");
    }

    protected function redirect($path) { // Redirects to the given path and exits the code
        header("location: " . $GLOBALS['path_subdomain'] . $path);
        exit(0);
    }
}