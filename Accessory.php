<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accessory
 *
 * @author Weezy
 */

require_once 'Connection.php';

class Accessory extends Connection {
    public $AccessoryNo;
    public $SKU;
    public $Name;
    public $Category;
    public $Description;
    public $InventoryNo;
    
    function __construct() {
        parent::__construct();
    }
}
// place code
?>
