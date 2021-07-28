<?php
session_start();
//$ssn	= $_SESSION['ssn'];
$nmdb	= $_SESSION['mapping'];

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = $mapping;
$dbutil = 'mapping_util';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($nmdb);


?>
