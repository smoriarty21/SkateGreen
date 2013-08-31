<?php
//Written By:Sean Moriarty
//Last Modified:March 03 2011

include "sqlCon.php";

$user = $_SESSION['username'];

$result = mysql_query("SELECT fname FROM loginInfo WHERE email = '$user'")
		or die("Cannot Select Data");

$row = mysql_fetch_array($result)
	or die ("Cannot Fetch Data");

$_SESSION['firstName'] = $row['fname'];
?>
