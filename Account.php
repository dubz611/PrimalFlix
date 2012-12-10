<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Account
 *
 * @author Weezy
 */

require_once 'Connection.php';

class Account extends Connection {
    public $AccountNo;
    public $InitialDate;
    public $IsValid;
    public $UserDetailNo;
    public $UserName;
    
    function __construct() {
        parent::__construct();
    }
}
// place code
?>
