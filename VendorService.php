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
    function invokeService($params) {
        if (isset($params['service'])) {
            if (isset($params['request'])) {
                $request = json_decode($params['request']);
            }
            header('Content-type: application/json');
            switch ($params['service']) {
                case "getAllVendors": 
                    echo json_encode((object) array('vendors' => getAllVendors()));
                    break;
            }
            exit;
        }        
    }
    function getAllVendors() {
        $vendor = new Vendor();
        $SQL="SELECT * FROM Vendor";
        $sth = $vendor->dbh->prepare($SQL);
        // $sth->setFetchMode( PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Vendor');
        $sth->setFetchMode( PDO::FETCH_CLASS, 'Vendor');
        $sth->execute();
        return $sth->fetchAll();        
    }

?>
