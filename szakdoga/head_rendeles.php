<!DOCTYPE HTML>
<link href="css/style_vedett.css" rel="stylesheet" type="text/css" />
<?php
require_once('connect.php');
session_start();
if(isset( $_SESSION["rang"] ) && $_SESSION["rang"] == 2)
{  echo '<div id="belepve">
<label>Belépve: <span style="color:#900;"> ' . $_SESSION["user"] . '</label><br /><br />
 		<label>Ön a rendeléskezelő felületen tartózkodik.</label><br /><br />
		</div>
		<div id="menupontok_left">
<ul>
<li><a href="rendelesek.php">RENDELÉSEK</a></li>
<li><a href="rendelesek_teljesitett.php">TELJESÍTETT RENDELÉSEK</a></li>
<li><a href="rendelesek_hibas.php">TÖRÖLT/HIBÁS RENDELÉSEK</a></li>
<ul>
</div>
<div id="teteje">
<a href="logout_session.php">Kilépés</a>
</div>';
}
else{
	echo "Ennek az oldalnak a tartalmához nincs hozzáférésed!";
	exit(); 
}
?>


