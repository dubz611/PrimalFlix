<?php
session_start();
error_reporting(0); //remove error reporting to user.

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';

$errors = array();
?>
