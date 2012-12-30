<?php
header("Content-type: text/javascript");

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'PrimalFlix';

$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$dbh->exec('SET NAMES "utf8"');

$sql = "SELECT name, description, rating FROM DVD ORDER BY name";
$result = $dbh->query($sql);
foreach ($result as $row)
{
$arr[]= array(
    'name'          => $row['name'],
    'description'   => $row['description'],
    'rating'        => $row['rating']);
}
echo json_encode($arr);
$dbh = null;
?>
 