<? 
//Created By:Sean Moriarty
//Last Edited:March 10 2011

session_start();

$states = array(AL, AK, AZ, AR, CA, CO, CT, DE, FL, GA, HI, ID, AL, IN, IA, KS, KY ,LA, ME, MD, MA, MI, MN, MS, MO, MT, NE, NV, NH, NJ, NM, NY, NC,ND, OH, OK, "OR", PA, RI, SC, SD, TN, TX, UT, VT, VA, WA, WV, WI, WY);
$_SESSION['bigPic'] = 0;
$display = 1;
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
	       <form action = "processPics.php" method = "post">
		State:
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
		<br>
		<input type = "submit" value = "Send" onClick = "alert('Hello!');return false">
		<br>
		City:<input type = "text" size = "10" name = "town"><br>
		<input type = "submit" value = "Send">
		Spot:<input type = "text" size = "10" name = "spot"><br>
		<input type = "submit" value = "Get Pics">
                </form>
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
