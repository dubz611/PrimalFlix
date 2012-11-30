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
    private $params;
    function invokeService($params) {
        $this->params = $params;
        if (isset($this->params['service'])) {
            if (isset($this->params['request'])) {
                $this->request = json_decode($this->params['request']);
            }
            header('Content-type: application/json');
            switch ($this->params['service']) {
                case "getAllVendors": 
                    echo json_encode((object) array('vendors' => $this->getAllVendors()));
                    break;
            }
            exit;
        }        
    }
    function getAllVendors() {
        $vendor = new Vendor();
        $SQL="SELECT * FROM Vendor";
        $sth = $vendor->dbh->prepare($SQL);
        $sth->setFetchMode( PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Vendor');
        $sth->execute();
        return $sth->fetchAll();        
    }

?>
