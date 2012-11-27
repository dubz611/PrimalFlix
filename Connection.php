<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author james
 */
class Connection {
    public $dbh;
    public $settings;
    public function __construct() {
        $this->settings = parse_ini_file("settings.ini", true);
        $this->dbh = new PDO(
            $this->settings['connection']['dsn'], 
            $this->settings['connection']['user'], 
            $this->settings['connection']['passwd'],
            array(
                PDO::ATTR_PERSISTENT => true,
                PDO::MYSQL_ATTR_LOCAL_INFILE => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            )
        );                
        // $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);         
        // $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, (version_compare($this->dbh->getAttribute(PDO::ATTR_SERVER_VERSION), '5.1.17', '<')));
        $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    }
    public function __destruct() {
        $this->dbh = null;
        unset($this->settings);
    }
}

?>
