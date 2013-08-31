<?php
//Created By:Sean Moriarty
//Last Edited:March 09 2011

//Get state input from user
$city = $_POST['city'];
$state = $_POST['state'];

//Connect to mySQL
include 'sqlCon.php';

//Select all cities in state 
$result = mysql_query("SELECT spot FROM spotPics WHERE state = '$state' AND city = '$city'");

//Add matchin city names to array
$i = 0;

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
$spots[] = $row['spot'];
$i++;
}

$spots = serialize($spots);

header("Location:spots.php?display=3&i=$i&spots=$spots&state=AL&city=hess");
?>

