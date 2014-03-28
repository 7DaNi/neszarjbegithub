<?php
require_once('connect.php');
if (isset($_GET['id']) && isset($_GET['rendelesid'])){
	$id = $_GET['id'];
	$rendelesid = $_GET['rendelesid'];
	
}
	 
	 $dbc = mysqli_connect(host,user,pw,db) or die('Bukó');
	 mysqli_query($dbc,"SET NAMES utf8");
	 
	 $query = "DELETE FROM rendeles WHERE id ='$id' LIMIT 1";
	 
	 mysqli_query($dbc,$query);
	 mysqli_close($dbc);
	 
	 
	 
	 $url = 'rendeleslista.php?rendelesid=' .$rendelesid. '';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
	
?>	
