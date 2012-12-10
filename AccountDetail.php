<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountDetail
 *
 * @author Weezy
 */

require_once 'Connection.php';

class AccountDetail extends Connection {
    public $UserName;
    public $Password;
    public $Email;
    
    function __construct() {
        parent::__construct();
    }
}
// place code
?>
