<?php
//Written By:Sean Moriarty
//Last Modified:March 03 2011

include "sqlCon.php";

$state = $_POST['state'];

$result = mysql_query("SELECT town FROM spotPics WHERE state = '$state'")
				or die ("Cannot select Data");

echo $result[1]." ".$result[0]." ".$result[2];


?>
