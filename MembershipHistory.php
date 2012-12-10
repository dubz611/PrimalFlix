<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MembershipHistory
 *
 * @author Weezy
 */

require_once 'Connection.php';

class MembershipHistory extends Connection {
    public $MemberOrderNo;
    public $MemberCode;
    public $AccountNo;
    public $ActualCost;
    public $StartDate;
    public $EndDate;
    
    function __construct() {
        parent::__construct();
    }
}
// place code
?>
