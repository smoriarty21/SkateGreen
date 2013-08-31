<? 
//Created By:Sean Moriarty
//Last Updated:March 03 2011
session_start();

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

//if(isset($_POST['submit']))
//{
 //Check for correct file type and size
/* if($imgType !== "image/jpeg" && $imgType !== "image/gif" && $imgType !== "image/png")
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
*/

 //If folder can be written to upload picture
 $targetPath = $targetPath . basename($imgName);

 if(move_uploaded_file($imgTmpName,$targetPath))
 {
  $uploaded = true;
  echo $imgTmpName." has been uploaded";
 } 
 else 
 {
   $error[] = "Error uploading file";
 }
/*
 //Enter info into table
 include "sqlCon.php";

 mysql_query("INSERT INTO spotPics(name, town, state, spot, uploadDate, uploader, verified) VALUES('$imgName','$town','$state','$spot','$date','$user','0')") 
	or die("Cannot write to table");
//}

if(empty($error) && $uploaded == true)
{
$_SESSION['upload'] = true;
header("Location:uploadPics.php");
}
else
{
$_SESSION['upload'] = false;
$_SESSION['uploadErrors'] = $error;
header("Location:uploadPics.php");
}
*/
?>
