<?php
//**********************************
//*  Written By:Sean Moriarty      *
//*  Last Modified:March 03 2011   *
//**********************************

//Start Session
session_start();
$pics = $_SESSION['pictures'];
$bigPic = 0;
$_SESSION['bigPic'] = $bigpic;

//Get variables var1:Clicked Image/var2:Image in big box/var3:image clicked's number in array
$pic1 = $_GET['var1'];
$pic2 = $_GET['var2'];
$i = $_GET['var3'];

echo $pic1." ".$pic2."<br>";
//Switch names pic1 goes to temp pic2 overwrites pic1 then pic2 is given temp value of pic1
$temp = $pic1;
$pic1 = $pic2;
$pic2 = $temp;

echo $pic1." ".$pic2."<br>";
//Turn Old Big Pic into new pic1
$newBigPic = $pic2;
$_SESSION['bigPic'] = $newBigPic;

echo $_SESSION['bigPic'];

//$_SESSION['pictures'] = $pics;

header("Location:showPics.php");

?>


