<?php
//Created By:Sean Moriarty
//Last Updated:March 03 2011

session_start();

include "notLoggedIn.php";
include "sqlCon.php";

$error = array();
$imgName = $_FILES["fileToUpload"]["name"];
$imgType = $_FILES["fileToUpload"]["type"];
$imgSize = ($_FILES["fileToUpload"]["size"] / 1024);
$imgTmpName = $_FILES["fileToUpload"]["tmp_name"];
$town = $_POST['town'];
$state = $_POST['state'];
$spot = $_POST['spot'];
$date = date('m d Y');
$user = $_SESSION['username'];
$targetPath = "Pics/";
$error = array();
$uploaded = false;
$town = strtolower($town);
$spot = strtolower($spot);

$states = array(AL, AK, AZ, AR, CA, CO, CT, DE, FL, GA, HI, ID, AL, IN, IA, KS, KY ,LA, ME, MD, MA, MI, MN, MS, MO, MT, NE, NV, NH, NJ, NM, NY, NC, ND, OH, OK, "OR", PA, RI, SC, SD, TN, TX, UT, VT, VA, WA, WV, WI, WY);
?>

<html>

<title>Skater Greenz Upload Pictures</title>

<head>
<?php
  include "layoutTop.php";
?>
</head>

<body>
<center>	
<table border = "1" width = "350" height = "200">
	 <tr>
	  <td>
	   <form enctype = "multipart/form-data" method = "post" action = ""> 
	    <input type = "file" name = "fileToUpload"><br>
 	    <input type = "submit" name = "submit" value = "Upload">
	  </td>
	 </tr>
	 <tr>
	  <td>
                <select name = "state">
                   <?php
                     $i = 0;
                     while($i < 50)
                     {
                       echo "<option value = '".$states[$i]."'>".$states[$i]."</option>";
                       $i++;
                     }
                   ?>
                </select>
		City:<input type = "text" maxlength = "15" size = "15" name = "town">
	  </td>
	 </tr>
	<tr>
	 <td>
	 Spot:<input type = "text" name = "spot" maxlength = "50" size = "15">
	 </form>
	 </td>
	</tr>
	</table>
</center>
<?php
if(isset($_POST['submit']))
{
 //Check for correct file type and size
 if($imgType !== "image/jpeg" && $imgType !== "image/gif" && $imgType !== "image/png")
 {
   $error[] =  "Incorrect File Type";
 }
 //Check that target path is writable
 if(!is_writable($targetPath))
 {
   $error[] = "Cannot Write To FTP Server";
 }
 //Check that file size is acceptable
 if($imgSize > 3500)
 {
   $error[] = "File is to Large.  Max Size is 6000Kb.";
 }
 //Check that city and spot are filled out
 if(trim($town == "") || trim($spot) == "")
 {
 $error[] = "Please fill in both City and State";
 }

//If upload is error free
 if(empty($error))
 {
//insert data into spotPics database
  mysql_query("INSERT INTO spotPics(name, town, state, spot, uploadDate, uploader, verified) VALUES('$imgName','$town','$state','$spot','$date','$user','0')")
        or die("Cannot write to table");
  
//If Location does not exist in database add it
  $result = mysql_query("SELECT * FROM locations WHERE state = $state AND town = $town");
  $row = mysql_fetch_array($result);
echo $row;
  if($row == 0)
  {
   mysql_query("INSERT INTO locations(state, city) VALUES('$state', '$town')");
  }  
  else {}
  $targetPath = $targetPath . basename($imgName);

  if(move_uploaded_file($imgTmpName,$targetPath))
  {
   $uploaded = true;
  }
  echo "<center>|| Image Uploaded Successfully! ||</center>";
 }
 if(!empty($error))
 {
  foreach($error as $errors)
  {
   echo "<center>"." || ".$errors." || "."</center>";
  }
 }
}
?>
<?php
  include "layoutBot.php";
?>
</body>

</html>

