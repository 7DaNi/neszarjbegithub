<?php
require_once('connect.php');
if (isset($_GET['rendelesid']) && isset($_GET['userid']) && isset($_GET['nev']) && isset($_GET['datum']) && isset($_GET['allapot'])){
	$rendelesid = $_GET['rendelesid'];
	$userid = $_GET['userid'];
	$nev = $_GET['nev'];
	$datum = $_GET['datum'];
	$allapot = $_GET['allapot'];
}
	
	 $dbc = mysqli_connect(host,user,pw,db) or die('Bukó');
	 mysqli_query($dbc,"SET NAMES utf8");
	 
	 $query = "UPDATE rendelesek SET allapot= 'kész' WHERE rendelesid = '$rendelesid' LIMIT 1";
	 
	 mysqli_query($dbc,$query);
	 mysqli_close($dbc);
	 
	 $dbc = mysqli_connect(host,user,pw,db) or die('Bukó');
	 mysqli_query($dbc,"SET NAMES utf8");
	 
	 $query = "INSERT INTO rendelesek_teljesitett (rendelesid, userid, nev, datum, allapot)
VALUES ('$rendelesid','$userid','$nev','$datum','$allapot')";
	 
	 mysqli_query($dbc,$query);
	 mysqli_close($dbc);
	 
	  $dbc = mysqli_connect(host,user,pw,db) or die('Bukó');
	 mysqli_query($dbc,"SET NAMES utf8");
	 
	 $query = "DELETE FROM rendelesek WHERE rendelesid ='$rendelesid' LIMIT 1";
	 
	 mysqli_query($dbc,$query);
	 mysqli_close($dbc);
	 
	 $url = 'rendelesek.php';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
?>	
