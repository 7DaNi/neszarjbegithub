<?php
require_once('connect.php');
if (isset($_GET['rendelesid'])){
	$rendelesid = $_GET['rendelesid'];
}
	 $dbc = mysqli_connect(host,user,pw,db) or die('Bukó');
	 mysqli_query($dbc,"SET NAMES utf8");
	 
	 $query = "UPDATE rendelesek SET allapot= 'folyamatban' WHERE rendelesid = '$rendelesid' LIMIT 1";
	 
	 mysqli_query($dbc,$query);
	 mysqli_close($dbc);
	 
	 $url = 'rendelesek.php';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
?>	
