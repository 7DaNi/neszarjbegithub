<?php
require_once('head_admin.php');
?>
<h2>Kiegészítők</h2>
<div id="lista">
	<form name="rendeleskereses" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="keresomezo"  placeholder="Keresés" value="<?php if (isset($_POST['keres'])) {echo $_POST['keresomezo'];} ?>"/>
    <input type="submit" name="keres" value="Keresés" />
    <a href="pizzak_admin.php"><input type="button" name="megsem" value="Alaphelyzet" /></a>
    </form>
</div>
<?php 
if (isset($_POST['keres']) && !empty($_POST['keresomezo'])) {
	$feltetel = $_POST['keresomezo'];
		
echo '
<table id="tabla" width="70%" cellpadding="0" cellspacing="0" border="1" align="right">
<tr bgcolor="#E0FFFF">
	<th>Étel név</th>
	<th>Leírás</th>
	<th>Kép</th>
    <th>Művelet</th>
</tr>';
	$dbc = mysqli_connect(host,user,pw,db) or die('Nem jött be!');
	mysqli_query($dbc,"SET NAMES utf8");
	$query = "SELECT * FROM termekek WHERE kategoria='kiegészítők' AND etelnev LIKE '%" . $feltetel . "%' OR leiras LIKE '%" . $feltetel . "%' OR kep LIKE  '%" . $feltetel . "%'";
	$lekerdezes = mysqli_query($dbc,$query);
	while ($adatok = mysqli_fetch_array($lekerdezes)){
		$kategoria = $adatok['kategoria'];
		$etelnev = $adatok['etelnev'];
		$leiras = $adatok['leiras'];
		$kep = $adatok['kep'];
echo '
<tr>
	<td>' . $etelnev . '</td>
	<td>' . $leiras . '</td>
	<td>' . $kep . '</td>
	<td><a href="termekek_adminmodositas.php?kategoria=' . $kategoria . '&etelnev=' . $etelnev . '&leiras=' . $leiras . '&kep=' . $kep . '">Modosítás</a> | <a href="termekek_admintorles.php?kategoria=' . $kategoria . '&etelnev=' . $etelnev . '&leiras=' . $leiras . '&kep=' . $kep . '">Törlés</a></td>

</tr>';
	}
	
}
else {
	echo '
<table id="tabla" width="70%" cellpadding="0" cellspacing="0" border="1" align="right">
<tr bgcolor="#E0FFFF">
	<th>Étel név</th>
	<th>Leírás</th>
	<th>Kép</th>
    <th>Művelet</th>
</tr>';
	$dbc = mysqli_connect(host,user,pw,db) or die('Nem sikerült!');
	mysqli_query($dbc,"SET NAMES utf8");
	
	$query = "SELECT * FROM termekek WHERE kategoria='kiegészítők'";
	
	$lekerdezes = mysqli_query($dbc,$query);
	
	while ($adatok = mysqli_fetch_array($lekerdezes)){
		$kategoria = $adatok['kategoria'];
		$etelnev = $adatok['etelnev'];
		$leiras = $adatok['leiras'];
		$kep = $adatok['kep'];
	
echo '
<tr>
	<td>' . $etelnev . '</td>
	<td>' . $leiras . '</td>
	<td>' . $kep . '</td>
	<td><a href="termekek_adminmodositas.php?kategoria=' . $kategoria . '&etelnev=' . $etelnev . '&leiras=' . $leiras . '&kep=' . $kep . '">Modosítás</a> | <a href="termekek_admintorles.php?kategoria=' . $kategoria . '&etelnev=' . $etelnev . '&leiras=' . $leiras . '&kep=' . $kep . '">Törlés</a></td>
</tr>';
	}
}

?>
</table>
<?php
require_once('footer_rendeles.php');
?>