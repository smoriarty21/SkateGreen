<?php 
//Created By:Sean Moriarty
//Last Edited:March 10 2011

session_start();

$states = array(AL, AK, AZ, AR, CA, CO, CT, DE, FL, GA, HI, ID, AL, IN, IA, KS, KY ,LA, ME, MD, MA, MI, MN, MS, MO, MT, NE, NV, NH, NJ, NM, NY, NC,ND, OH, OK, "OR", PA, RI, SC, SD, TN, TX, UT, VT, VA, WA, WV, WI, WY);
$_SESSION['bigPic'] = 0;
$display = $_GET['display'];
$dispCity = $_GET['city'];
$dispI = $_GET['i'];
$state = $_POST['state'];
$dispState = $_GET['state'];
$dispCity = $_GET['city'];
$spots = $_GET['spots']; 

include "sqlCon.php";
?>

<html>

<title>Skater Greenz Skate Spots</title>

<head>
<?php 
  include "layoutTop.php";
?>
</head>

<body>

<center>
<table border = "1" height = "30" width = "265">
<tr>
<td align = "center">
<a href = "">Longboard</a></td><td align = "center"><a href = "">Skateboard</a>
</td>
</tr>
</table>
</center>

<table border = "1" width = "860" height = "1000">
 <tr>
  <td valign = "top">
  
	  <table border = 1 width = "120">
	   <tr>
            <td>
<?php

if($display == 1 || $display == null)
{
 $i = 0;
 echo "<form method = 'post' action = 'getCity.php'><select name = 'state'>";
  while($i < 50)
  {
   echo "<option value = '".$states[$i]."'>".$states[$i]."</option>";
   $i++;
  }
 echo "</select><br><input type = 'submit' value = 'Send'></form>";
}

if($display == 2)
{
 $cityArr = unserialize($dispCity);
 $i = $dispI;
 $x = 0;
 
 echo "<form method = 'post' action = 'getSpot.php'>";
 echo "State: "."<input type = 'hidden' value = '$dispState' name = 'state'>".$dispState."<br>";
 echo "City:<form method = 'post' action = 'getSpot.php'><select name = 'city'><option value = '*'>All</option>";
  while($x < $i)
  {
   echo "<option value = '".$cityArr[$x]."'>".$cityArr[$x]."</option>";
   $x++;
  }
 echo "</select>";
 echo "<input type = 'submit' value = 'Find Spots'></form>";
}

if($display >= 3)
{
 $i = $dispI;
 $x = 0;
 $spotArr = unserialize($spots);

 echo "<form action = 'showPics.php' method = 'post'>";
 echo "State: "."<input type = 'hidden' value = '$dispState' name = 'state'>".$dispState."<br>";
 echo "City: "."<input type = 'hidden' value = '$dispCity' name = 'city'>".$dispCity."<br>";
 echo "Spot:<select name = 'city'><option value = '*'>All</option>";
  while($x < $i)
  {
   echo "<option value = '".$spotsArr[$x]."'>".$spotsArr[$x]."</option>";
   $x++;
  }
 echo "</select>";
 echo "<input type = 'submit' value = 'View Pictures'></form>";
}

?>
	    </td>
           </tr>
          </table>

  </td>
  <td width = "710">
  </td>	 
 </tr>
</table>

<?php
  include "layoutBot.php";
?>
</body>
                                                                                                                                                           
</html>
