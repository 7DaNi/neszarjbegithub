<?php
require_once('head_rendeles.php');
?>
<h2>Teljesített rendelések</h2>
<div id="lista">
	<form name="rendeleskereses" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="keresomezo"  placeholder="Keresés" value="<?php if (isset($_POST['keres'])) {echo $_POST['keresomezo'];} ?>"/>
    <input type="submit" name="keres" value="Keresés" />
    <a href="rendelesek.php"><input type="button" name="megsem" value="Alaphelyzet" /></a>
    </form>
</div>
<?php 
if (isset($_POST['keres']) && !empty($_POST['keresomezo'])) {
	$feltetel = $_POST['keresomezo'];
		
echo '
<table id="tabla" width="70%" cellpadding="0" cellspacing="0" border="1" align="right">
<tr bgcolor="#E0FFFF">
	<th>Rendelésszám</th>
	<th>Név</th>
	<th>Megjegyzés</th>
	<th>Dátum</th>
	<th>Állapot</th>
    <th>Művelet</th>
</tr>';
	$dbc = mysqli_connect(host,user,pw,db) or die('Nem jött be!');
	mysqli_query($dbc,"SET NAMES utf8");
	$query = "SELECT * FROM rendelesek_teljesitett WHERE rendelesid LIKE '%" . $feltetel . "%' OR userid LIKE '%" . $feltetel . "%' OR nev LIKE  '%" . $feltetel . "%' OR megjegyzes LIKE  '%" . $feltetel . "%' OR datum LIKE  '%" . $feltetel . "%' OR allapot LIKE  '%" . $feltetel . "%'";
	$lekerdezes = mysqli_query($dbc,$query);
	while ($adatok = mysqli_fetch_array($lekerdezes)){
		$rendelesid = $adatok['rendelesid'];
		$userid = $adatok['userid'];
		$nev = $adatok['nev'];
		$megjegyzes = $adatok['megjegyzes'];
		$datum = $adatok['datum'];
		$allapot = $adatok['allapot'];
echo '
<tr>
	<td>' . $rendelesid . '</td>
	<td>' . $nev . '</td>
	<td>' . $megjegyzes . '</td>
	<td>' . $datum . '</td>
    <td>' . $allapot . '</td>
	<td><a href="rendelescim.php?userid=' . $userid . '&allapot=' . $allapot . '">Cím</a> | <a href="rendeleslista.php?rendelesid=' . $rendelesid . '&allapot=' . $allapot . '">Rendelés lista</a> | <a href="rendelestorles.php?rendelesid=' . $rendelesid . '">Törlés</a></td>
</tr>';
	}
	
}
else {
	echo '
<table id="tabla" width="70%" cellpadding="0" cellspacing="0" border="1" align="right">
<tr bgcolor="#E0FFFF">
	<th>Rendelésszám</th>
	<th>Név</th>
	<th>Megjegyzés</th>
	<th>Dátum</th>
	<th>Állapot</th>
    <th>Művelet</th>
</tr>';
	$dbc = mysqli_connect(host,user,pw,db) or die('Nem sikerült!');
	mysqli_query($dbc,"SET NAMES utf8");
	
	$query = "SELECT * FROM rendelesek_teljesitett";
	
	$lekerdezes = mysqli_query($dbc,$query);
	
	while ($adatok = mysqli_fetch_array($lekerdezes)){
		$rendelesid = $adatok['rendelesid'];
		$userid = $adatok['userid'];
		$nev = $adatok['nev'];
		$megjegyzes = $adatok['megjegyzes'];
		$datum = $adatok['datum'];
		$allapot = $adatok['allapot'];
	
echo '
<tr>
	<td>' . $rendelesid . '</td>
	<td>' . $nev . '</td>
	<td>' . $megjegyzes . '</td>
	<td>' . $datum . '</td>
    <td>' . $allapot . '</td>
	<td><a href="rendelescim.php?userid=' . $userid . '&allapot=' . $allapot . '">Cím</a> | <a href="rendeleslista.php?rendelesid=' . $rendelesid . '&allapot=' . $allapot . '">Rendelés lista</a> | <a href="rendelestorles.php?rendelesid=' . $rendelesid . '">Törlés</a></td>
</tr>';
	}
}

?>
</table>
<?php
require_once('footer_rendeles.php');
?>