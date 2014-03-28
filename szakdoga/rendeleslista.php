<?php
require_once('head_rendeles.php');
?>
<h2>Rendelés lista</h2>
<?php
if (isset($_GET['rendelesid']) && isset($_GET['allapot'])){
	$rendelesid = $_GET['rendelesid'];
	$allapot = $_GET['allapot'];
}
	
	echo '
<table id="tabla" width="70%" cellpadding="0" cellspacing="0" border="1" align="right">
<tr bgcolor="#E0FFFF">
	<th>Rendelésszám</th>
	<th>Ételnév</th>
	<th>Tészta</th>
	<th>Típus</th>
	<th>Kategória</th>
    <th>Ár</th>
	<th>Művelet</th>
	
</tr>';
	$dbc = mysqli_connect(host,user,pw,db) or die('Nem sikerült!');
	mysqli_query($dbc,"SET NAMES utf8");
	
	$query = "SELECT * FROM rendeles WHERE rendelesid = '$rendelesid'";
	
	$lekerdezes = mysqli_query($dbc,$query);
	
	while ($adatok = mysqli_fetch_array($lekerdezes)){
		$id = $adatok['id'];
		$rendelesid = $adatok['rendelesid'];
		$etelnev = $adatok['etelnev'];
		$teszta = $adatok['teszta'];
		$tipus = $adatok['tipus'];
		$kategoria = $adatok['kategoria'];
		$ar = $adatok['ar'];
		
	if($allapot=='új'){
echo '
<tr>
	<td>' . $rendelesid . '</td>
	<td>' . $etelnev . '</td>
	<td>' . $teszta . '</td>
	<td>' . $tipus . '</td>
    <td>' . $kategoria . '</td>
	<td>' . $ar . '</td>
	<td><a href="rendeleslista_torol.php?id=' . $id . '&rendelesid=' . $rendelesid . '">Törlés</a> | <a href="rendelesek.php">Vissza</a></td>
</tr>';
	}
	if($allapot=='kész'){
echo '
<tr>
	<td>' . $rendelesid . '</td>
	<td>' . $etelnev . '</td>
	<td>' . $teszta . '</td>
	<td>' . $tipus . '</td>
    <td>' . $kategoria . '</td>
	<td>' . $ar . '</td>
	<td><a href="rendeleslista_torol.php?id=' . $id . '&rendelesid=' . $rendelesid . '">Törlés</a> | <a href="rendelesek_kesz.php">Vissza</a></td>
</tr>';
	}
	if($allapot=='törölt'){
echo '
<tr>
	<td>' . $rendelesid . '</td>
	<td>' . $etelnev . '</td>
	<td>' . $teszta . '</td>
	<td>' . $tipus . '</td>
    <td>' . $kategoria . '</td>
	<td>' . $ar . '</td>
	<td><a href="rendeleslista_torol.php?id=' . $id . '&rendelesid=' . $rendelesid . '">Törlés</a> | <a href="rendelesek_hibas.php">Vissza</a></td>
</tr>';
	}}

?>
</table>
<?php
require_once('footer_rendeles.php');
?>