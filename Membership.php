<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Membership
 *
 * @author Weezy
 */

require_once 'Connection.php';

class Membership extends Connection {
    public $MemberCode;
    public $Name;
    public $DiscountRate;
    public $UnitPrice;
    public $Duration;
    
    function __construct() {
        parent::__construct();
    }
}
// place code
?>
