<?php


$loggedIn = false;

include "sqlCon.php";

//Grab username and password
$username = $_POST['user'];
$password = $_POST['pass'];
$hashedPass = sha1($password);

//Check for correct account info
$query = "SELECT * FROM loginInfo WHERE email = '$username' AND password = '$hashedPass'";

$result = mysql_query($query);
$found = mysql_num_rows($result);

//If account found login
if($found > 0)
{
session_start();
$_SESSION['loggedin'] = 1;
$_SESSION['username'] = $username;
header("location: index.php");
include "getname.php";
}

?>

<html>

<title></title>

<head>
	<style type = "text/css">

	 .dead_center
	  {

	   position: absolute;
	   top: 0;
	   bottom: 0;
	   left: 0;
	   right: 0;
	   height: 20%;
	   width: 20%;
	   margin: auto;

	  }	

	</style>
</head>

<body>

<form action = "" method = "post">

	<table border = '0' class = "dead_center">
	<tr>
	<td>Username:</td>
	<td><input type = "text" name = "user" maxlength = "50"></td>
	</tr>
	<tr>
	<td>Password:</td>
	<td><input type = "password" name = "pass" maxlength = "20"></td>
	</tr>
	<tr>
	<td><input type = "submit" value = "Submit"></td>
	<td align = "right">
	<a href = "register.php">Register<font color = "white">______</font></a>
	</td>
	</tr>
	</table>

</form>

</body>

</html>
