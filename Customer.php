<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer
 *
 * @author Weezy
 */

require_once 'Connection.php';

class Customer extends Connection {
    public $CustomerNo;
    public $AccountNo;
    
    function __construct() {
        parent::__construct();
    }
}
// place code
?>
