<?php
define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DBNAME","shopping");

$con= mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
if ($con) {

	echo "you are connected";
	# code...

}
?>

