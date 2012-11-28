<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inventory
 *
 * @author Weezy
 */
class Inventory extends Connection {
    public $InventoryNo;
    public $Quantity;
    public $UnitPrice;
    // Using parent constructor function
    function __construct() {
        parent::__construct();
    }
    public function getByInventoryNumber($inventoryNo) {
        $SQL="SELECT * FROM Inventory WHERE InventoryNo = :inventoryNo";
        $sth = $this->dbh->prepare($SQL);
        $sth->execute(array(
            ":inventoryNo" => $inventoryNo
        ));
        $sth->setFetchMode( PDO::FETCH_INTO, $this);
        $sth->fetch(PDO::FETCH_INTO);        
        $sth->closeCursor();
    }
    public function updateQuantity($quantity) {
        $SQL="UPDATE Inventory SET Quantity=:quantity WHERE InventoryNo=:inventoryNo";
        $sth = $this->dbh->prepare($SQL);
        $sth->execute(array(
            ":quantity" => $quantity,
            ":inventoryNo" => $this->InventoryNo
        ));
        // Refresh Inventory table
        $this->getByInventoryNumber($this->InventoryNo);
    }    
    
}

?>
