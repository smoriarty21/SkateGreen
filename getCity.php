<?php
//Created By:Sean Moriarty
//Last Edited:March 09 2011

//Get state input from user
$state = $_POST['state'];

//Connect to mySQL
include 'sqlCon.php';

//Select all cities in state 
$result = mysql_query("SELECT city FROM locations WHERE state = '$state'");

//Add matchin city names to array
$i = 0;

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
$city[] = $row['city'];
$i++;
}

$city = serialize($city);
echo $city[0]." ".$i;

header("Location:spots.php?display=2&i=$i&city=$city&state=$state");
?>
