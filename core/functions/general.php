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

?>
