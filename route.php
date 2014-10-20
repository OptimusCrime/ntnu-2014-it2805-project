<?php
/*
 *
 * File: route.php
 * Description: Routes the request
 *
*/

//
// Check what kind of request is incoming
//

if (preg_match('/\.(?:png|jpg|jpeg|gif|txt|css|js)$/', $_SERVER['REQUEST_URI'])) {
    // Static request, return as is
    return false;
}
else {
    // Dynamic request
    include dirname(__FILE__) . '/index.php';
}