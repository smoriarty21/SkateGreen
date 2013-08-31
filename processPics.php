<?php

session_start();

//Grab username
$user = $_SESSION['username'];

//Setup info from post
$town = $_POST['town'];
$state = $_POST['state'];
$spot = $_POST['spot'];
$spot = strtolower($spot);
$town = strtolower($town);

//Connect to sql
include "sqlCon.php";

//Search database for pics with matching info
$result = mysql_query("SELECT * FROM spotPics WHERE state = '$state' and  town = '$town' and spot = '$spot'");

//Add matching pic names to array
$i = 0;

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{

$data[] = $row['name'];

}

$_SESSION['pictures'] = $data;
$_SESSION['bigPic'] = $data[0];

header("Location:showPics.php");

?>
