<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VendorOrder
 *
 * @author Weezy
 */

require_once 'Connection.php';

class VendorOrder extends Connection {
    public $VendorOrderNo;
    public $VendorOrder;
    public $InventoryNo;
    public $Date;
    public $QuantityOrdered;
    public $QuantitySupplied;
    public $UnitCost;
    public $ActualCost;
    
    function __construct() {
        parent::__construct();
    }
}
// place code
?>
