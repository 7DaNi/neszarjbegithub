<!DOCTYPE HTML>
<link href="css/style_vedett.css" rel="stylesheet" type="text/css" />
<?php
require_once('connect.php');
session_start();
if(isset( $_SESSION["rang"] ) && $_SESSION["rang"] == 3)
{  echo '<div id="belepve">
<label>Belépve: <span style="color:#900;"> ' . $_SESSION["user"] . '</label><br /><br />
 		<label>Ön az admin felületen tartózkodik.</label><br /><br />
		</div>
		<div id="menupontok_left">
<ul>
<li><a href="pizzak_admin.php">PIZZÁK</a></li>
<li><a href="salatak_admin.php">SALÁTÁK</a></li>
<li><a href="desszertek_admin.php">DESSZERTEK</a></li>
<li><a href="uditok_admin.php">ÜDÍTŐK</a></li>
<li><a href="kiegeszitok_admin.php">KIEGÉSZÍTŐK</a></li>
<li><a href="arak_admin.php">ÁRAK</a></li>
<li><a href="banner_admin.php">BANNER</a></li>
<li><a href="felhasznalok_admin.php">FELHASZNÁLÓK</a></li>
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


