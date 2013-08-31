<?php
//Written By:Sean Moriarty
//Last Modified:March 03 2011

session_start();

if($_SESSION['loggedin'] == 0)
{
header("Location:mustLogin.php");
}
?>
