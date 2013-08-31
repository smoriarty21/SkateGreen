<?php

session_start();

include "sqlCon.php";

$town = "falmouth";
$state = "MA";

$result = mysql_query("SELECT id FROM locations WHERE state = $state AND town = $town");


  while($row = mysql_fetch_array($result, MYSQL_ASSOC)
  {
   mysql_query("INSERT INTO locations(state, city) VALUES('$state', '$town')");
$i++;
  }
  else {}
 

?>
