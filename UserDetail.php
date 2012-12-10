<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserDetail
 *
 * @author Weezy
 */

require_once 'Connection.php';

class UserDetail extends Connection {
    public $UserDetailNo;
    public $FirstName;
    public $LastName;
    public $Phone;
    public $Phone2;
    public $Fax;
    public $AddressNo;      
    
    function __construct() {
        parent::__construct();
    }
}
// place code
?>
