<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomerDetail
 *
 * @author Weezy
 */

require_once 'Connection.php';

class CustomerDetail extends Connection {
    public $CustomerOrderNo;
    public $CustomerNo;
    public $InventoryNo;
    public $Date;
    public $QuantityOrdered;
    public $QuantitySupplied;
    public $ShippingFee;
    public $SaleAmount;
    public $TotalAmount;
    public $PromoCode;
    
    function __construct() {
        parent::__construct();
    }
}
// place code
?>
