<?php
    require_once 'Vendor.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VendorService
 *
 * @author Weezy
 */
    function getAllVendors() {
        $vendor = new Vendor();
        $SQL="SELECT * FROM Vendor";
        $sth = $vendor->dbh->prepare($SQL);
        $sth->setFetchMode( PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Vendor');
        $sth->execute();
        return $sth->fetchAll();        
    }

?>
