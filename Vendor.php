<?php
    require_once 'Connection.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vendor
 *
 * @author Weezy
 */
class Vendor extends Connection {
    public $VendorNo;
    public $VendorName;
    public $AccountNo;  
    function __construct() {
        parent::__construct();
    }
    //put your code here
    
}

?>
