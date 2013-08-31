<?php

session_start();

$user = $_SESSION['username'];

$town = $_POST['town'];
$state = $_POST['state'];
$spot = $_POST['spot'];

echo $town." ".$state." ".$spot;

echo $user;
echo "<br><br><br>";

include "sqlCon.php";

$result = mysql_query("SELECT * FROM spotPics WHERE state = '$state' and  town = '$town' and spot = '$spot'");

$i = 0;
$picNames = array();

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{

echo "<br>";
echo $row['town'];
echo "<br>";
echo $row['spot'];
echo "<br>";
$i++;
echo $i;
echo "<br>";

$data[] = $row['id'];

}

foreach($data as $datas)
{
echo $datas."<br>";
}

echo $i;
echo "<br>";

$x = 0;
$y = 1;

while($x <= $i)
{
echo $data[$x];
echo "<br>";
$x++;
}

if(mysql_num_rows($result) == 0)
{
echo "write to db";
}
else
{
echo "cant write to db";
}

?>
