<html>

<title>mySkatopia Registration</title>

<head>
 <style type = "text/css">
	table.center
	 {
	    position: relative;
	    margin-left:auto;
	    margin-right:auto;
	 }
 </style>

<?php
//Setup variables from form
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$squestion = $_POST["squestion"];
$sanswer = $_POST["sanswer"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$hPassword = sha1($password);

include "sqlCon.php";

$query = "INSERT INTO loginInfo(fname, lname, email, squestion, sanswer, password) VALUES('$fname', '$lname', '$email', '$squestion', '$sanswer', '$hPassword')";

?>
</head>

<body>

<form name = "register" action = "register.php" method = "post">

<table border = "1" class = "center">
<tr>
<td>

<table border = "1">
<tr>
<td>
<table border = "1">
<tr>
<td width = "170">
<h3>First Name:</h3>
</td>
<td>
<input type = "text" length = "45" maxlength = "10" name = "fname" align = "right">
</td>
</tr>
</table>
</td>
</tr>
</table>

<table border = "1">
<tr>
<td>
 <table border = "1">
 <tr>
 <td width = "170">
 <h3>Last Name:</h3>
 </td>
 <td>
 <input type = "text" length = "45" maxlength = "15" name = "lname" align = "right">
 </td>
 </tr>
 </table>
</td>
</tr>
</table>

<table border = "1">
<tr>
<td>
 <table border = "1">
 <tr>
 <td width = "170">
 <h3>Email:</h3>
 </td>
 <td>
 <input type = "text" length = "45" maxlength = "50" name = "email" align = "right">
 </td>
 </tr>
 </table>
</td>
</tr>
</table>

<table border = "1">
<tr>
<td>
 <table border = "1">
 <tr>
 <td width = "170">
 <h3>Security Question:</h3>
 </td>
 <td>
 <input type = "text" length = "45" maxlength = "50" name = "squestion" align = "right">
 </td>
 </tr>
 </table>
</td>
</tr>
</table>

<table border = "1">
<tr>
<td>
 <table border = "1">
 <tr>
 <td width = "170">
 <h3>Answer:</h3>
 </td>
 <td>
 <input type = "text" length = "45" maxlength = "20" name = "sanswer" align = "right">
 </td>
 </tr>
 </table>
</td>
</tr>
</table>

<table border = "1">
<tr>
<td>
 <table border = "1">
 <tr>
 <td width = "170">
 <h3>Password:</h3>
 </td>
 <td>
 <input type = "password" length = "45" maxlength = "15" name = "password" align = "right">
 </td>
 </tr>
 </table>
</td>
</tr>
</table>

<table border = "1">
<tr>
<td>
 <table border = "1">
 <tr>
 <td width = "170">
 <h3>Confirm Password:</h3>
 </td>
 <td>
 <input type = "password" length = "45" maxlength = "16" name = "cpassword" align = "right">
 </td>
 </tr>
 </table>
</td>
</tr>
</table>

</td>
</tr>
<tr>
<td align = "right">
<input type = "submit" value = "Submit" name = "submit">
</td>
</tr>
</table>

</form>

<?php

$success = false;
$error = array();

//Check for errors

if(isset($_POST["submit"])){

	//Check if empty
	if(empty($fname)){
 	  $error[] = '| Please Enter First Name |';
	}
	if(empty($lname)){
 	  $error[] = '| Please Enter Last Name |';
	}
	if(empty($email)){
 	  $error[] = '| Please Email Address |';
	}
	if(empty($squestion)){
 	  $error[] = '| Please Enter Security Question |';
	}
	if(empty($sanswer)){
 	  $error[] = '| Please Answer Security Question |';
	}
	if(empty($password)){
 	  $error[] = '| Please Enter Password |';
	}
	if(empty($cpassword)){
 	  $error[] = '| Please Confirm Password |';
	}
	//Test for all spaces as input
	if(strlen(trim(preg_replace('/\xc2\xa0/', ' ', $fname))) == 0){
          $error[] = '| Please Enter First Name |';
        }
	if(strlen(trim(preg_replace('/\xc2\xa0/', ' ', $lname))) == 0){
          $error[] = '| Please Enter Last Name |';
        }
	if(strlen(trim(preg_replace('/\xc2\xa0/', ' ', $email))) == 0){
          $error[] = '| Please Enter Email Address |';
        }
	if(strlen(trim(preg_replace('/\xc2\xa0/', ' ', $squestion))) == 0){
          $error[] = '| Please Enter Security Question |';
        }
	if(strlen(trim(preg_replace('/\xc2\xa0/', ' ', $sanswer))) == 0){
          $error[] = '| Please Enter Answer To Security Question |';
        }
	if(strlen(trim(preg_replace('/\xc2\xa0/', ' ', $password))) == 0){
          $error[] = '| Please Enter Password |';
        }
	//Test for passwords matching
	if($password != $cpassword){
	  $error[] = '| Passwords Do Not Match |';
	//Check password length
	}
	if(strlen($password) < 8){
	  $error[] = '| Password Is Not Long Enough |';
	}
	
	//If errors array is empty write info to database	
	if(empty($error)){
	  echo "successfuly created!";
	  $success = true;
	}
	else{
	echo "|";
	foreach($error as $errors){
	  echo $errors;
	}
	echo "|";
	}
	if(empty($error)){
	  echo $hPassword;	
	  mysql_query($query) or die ("Cannot Write to db");
	}

}

?>

</body>
</html>
