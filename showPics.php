<?php
//**********************************
//*  Written By:Sean Moriarty      *
//*  Last Modified:March 03 2011   *
//**********************************

//Start Session
session_start();

//Connect to MySQL
include "sqlCon.php";

//Setup Variables
$user = $_SESSION['username'];
$town = $_POST['town'];
$state = $_POST['state'];
$spot = $_POST['spot'];
$pics = $_SESSION['pictures'];
$bigPic = $_SESSION['bigPic'];
$town = strtolower($town);
$spot = strtolower($spot);
?>

<html>

<title>Skater Greenz Spot Pics</title>

<head>
 <?php
   include "layoutTop.php";
 ?>
</head>

<body>

<br>

<table border = "0" align = "right" width = "388" bgcolor = "black">
 <tr>
  <td>

	<table border = "0" height = "270" width = "350" align = "center">
	 <tr>
	  <td>
		<?php
		  echo " "."<img src = 'Pics/".$bigPic."' height = '270' width = '350'>";
		?>
	  </td>
	 </tr>
	</table>

<br>

	<table border = "0" align = "center">
 	 <tr>
  	  <td>
		<div style="width: 350px; height: 120px; overflow: auto">
		<?php
	 	  //Setup Variables
	 	  $i = 0;
	 	  $x = 1;
	 	  $main = 1;
          
	 	  //Display all images that meet criteria in alloted space
	 	  foreach($pics as $pic)
	 	  {
		     echo " <a href = 'swapPics.php?var".$x."=".$pics[$i];
		     $x++;
		     echo "&var".$x."=".$pics[$main];
		     $x++;
		     echo "&var".$x."=".$i."'><img src = 'Pics/".$pics[$i]."' height = '60' width = '75'></a>"."  ";
		     $i++;
		     $x = 1;
	 	  }
		?>	
		</div>
  	  </td>
 	 </tr>
	</table>
  </td>
</tr>
</table>

<?php

echo $pics[3];
include "layoutBot.php";

?>

</body>

</html>
