<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Game
 *
 * @author Weezy
 */

require_once 'Connection.php';

class Game extends Connection {
    public $GameNo;
    public $SKU;
    public $Name;
    public $Category;
    public $SystemType;
    public $Description;
    public $InventoryNo;
    
    function __construct() {
        parent::__construct();
    }
}
// place code
?>
