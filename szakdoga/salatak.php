<?php
require ("head.php");
$con = mysqli_connect ( host, user, pw, db );
if (mysqli_connect_errno ())
	echo mysqli_connect_error ();

$table = mysqli_query ( $con, "CREATE TABLE IF NOT EXISTS salatak(Nev CHAR(30), Ar INT, Leiras CHAR(255))" );
mysqli_query ( $con, "SET NAMES utf8" );
$query = mysqli_query ( $con, "SELECT * FROM salatak" );

echo "\n<table id = 'salatak_table'>\n";
$i = 1;
while ( $result = mysqli_fetch_assoc ( $query ) ) {
	if ($i == 1)
		echo "<tr>\n";
		// Adatmező
	echo "<td id ='salatak_td'>" . $result ['Nev'] . "</td>\n";
	
	if ($i == 3) {
		echo "</tr>\n";
		$i = 1;
	} else
		$i ++;
}
echo "</table>\n";
?>