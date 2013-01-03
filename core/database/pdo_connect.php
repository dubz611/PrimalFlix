<?php
//header("Content-type: text/javascript");

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'PrimalFlix';

$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$dbh->exec('SET NAMES "utf8"');

?>
