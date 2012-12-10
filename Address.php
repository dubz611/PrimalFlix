<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Address
 *
 * @author Weezy
 */

require_once 'Connection.php';

class Address extends Connection {
    public $AccountNo;
    public $Street;
    public $Street2;
    public $City;
    public $State;
    public $ZipCode;
    public $Country;
    
    function __construct() {
        parent::__construct();
    }
}
// place code
?>
