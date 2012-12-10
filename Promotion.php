<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Promotion
 *
 * @author Weezy
 */

require_once 'Connection.php';

class Promotion extends Connection {
    public $PromoCode;
    public $Name;
    public $Description;
    public $DiscountRate;
    public $StartDate;
    public $EndDate;
    
    function __construct() {
        parent::__construct();
    }
}
// place code
?>
