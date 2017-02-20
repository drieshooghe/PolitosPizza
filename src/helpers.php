<?php
//src/helpers.php

function getPublicPath($path) {
    return $GLOBALS['path_subdomain'] . $path;
}