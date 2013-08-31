<center>
<table border = "1" height = "1600" width = "850">
<tr>
<td valign = "top">

<?php
if(!isset($_SESSION['loggedin'])){
        echo '
        <table border = "1" bgcolor = "15d606" width = "860" height = "40">
         <tr>
          <td>
           <a href = "login.php">Login</a>
          </td>
         </tr>
        </table>
        ';
}
else if(isset($_SESSION['loggedin'])){
echo '
<table border = "1" bgcolor = "15d606" width = "860" height = "40">
<tr>
<td>
Hello '.$_SESSION['firstName'].' ||'.'<a href = "logout.php">Logout</a>'.'||'.'  
</td>
</tr>
</table>
';
}
?>

        <table border = "1" width = "350" height = "175">
         <tr>
          <td>
           <img src = "logo.jpg">
          </td>
         </tr>
        </table>

        <table border = "1">
         <tr>
<td>
           <img src = "greenBarBroke.jpg" height = "2" width = "850">
          </td>
         </tr>

        </table>

        <table border = "1" align = "right">
         <tr>
          <td>
           <img src = "shopLink.jpg">
           <a href = "spots.php"><img src = "sk8spotsLink.jpg"></a>
           <img src = "picsLink.jpg">
	   <a href = "uploadPics.php"><img src = "uploadPicsLink.jpg"></a>
          </td>
         </tr>

        </table>

        <table border = "1">
         <tr>
          <td>
           <img src = "greenBarBroke.jpg" height = "2" width = "850">
          </td>
	 </tr>
	</table>
