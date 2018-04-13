<?php
/* devicesTab on includattu sivulla:
    /header.php
    /selections/selectProduct.php
    /updates/updateProduct.php
*/
//session_start();
$host = 'localhost';
$user = 'projekti';
$password = 'tiistai2018';
$db = 'lainausjarjestelma';

// Create connection
$mysqli = new mysqli($host,$user,$password, $db) or die($mysqli->error);

mysqli_set_charset($mysqli, "utf8");
// Check connection
if ($mysqli->connect_error) {
   die("Connection failed: " . $mysqli->connect_error);
}
//echo "Connected successfully!";
