<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BluRay
 *
 * @author Weezy
 */

require_once 'Connection.php';

class BluRay extends Connection {
    public $BluRayNo;
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
