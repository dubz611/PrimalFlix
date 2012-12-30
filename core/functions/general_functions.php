<?php

/* General functions 
 * 
 * Created:     12/26/12
 * Author:      Wayne Fields
 */

// Sanitize parameters from sql injection
function sanitize($data) {
    return mysql_real_escape_string($data);
}

function array_sanitize(&$data) {
    $data = mysql_real_escape_string($data);
}

// Output friendly errors to user
function output_errors($errors) {
    return '<div id="err">"' . implode('"</div><div id="err">"', $errors) . '"</div>';
}

// Redirect unauthorized user
function protect_page() {
    if(logged_in() === false) {
        header('Location: unauthorized.php');
        exit();
    }
}

// Protect pages from re-entry
function logged_in_redirect() {
    if(logged_in() === true) {
        header('Location: index.php');
        exit();
    }
}

?>
