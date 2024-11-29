<?php
$sDbHost = 'localhost';
$sDbName = 'cu_visitors_vault';
$sDbUser = 'root';
$sDbPwd = '';

$dbConn = mysqli_connect ($sDbHost, $sDbUser, $sDbPwd) or 
	die ('MySQL connect failed. ' . mysqli_error());
	mysqli_select_db($dbConn,$sDbName) or die('Cannot select database. ' .mysqli_error());
?>