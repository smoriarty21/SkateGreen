<?

$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = '$pArk51088';
$dbname = 'skatopia';

$conn = mysql_connect($dbhost, $dbuser, $dbpassword) or die ('Could not connect to SQL');
mysql_select_db($dbname);

?>
