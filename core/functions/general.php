<?php

/* General functions 
 * 
 * Created:     12/26/12
 * Author:      Wayne Fields
 */

// Sanitize
function sanitize($data) {
    return mysql_real_escape_string($data);
 }
?>
