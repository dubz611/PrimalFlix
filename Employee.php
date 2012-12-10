<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employee
 *
 * @author Weezy
 */

require_once 'Connection.php';

class Employee extends Connection {
    public $EmpNo;
    public $HireDate;
    public $Occupation;
    public $ManagingNo;
    public $AccountNo;
    
    function __construct() {
        parent::__construct();
    }
}
// place code
?>
