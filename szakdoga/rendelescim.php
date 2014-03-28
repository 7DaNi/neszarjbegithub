<?php
require_once('head_rendeles.php');
?>
<h2>Rendelés cím</h2>
<?php
if (isset($_GET['userid']) && isset($_GET['allapot'])){
	$userid = $_GET['userid'];
	$allapot = $_GET['allapot'];
}
	
	echo '
<table id="tabla" width="70%" cellpadding="0" cellspacing="0" border="1" align="right">
<tr bgcolor="#E0FFFF">
	<th>Név</th>
	<th>Kerület</th>
	<th>Utca</th>
	<th>Házszám</th>
	<th>Csengő</th>
	<th>Telszám</th>
    <th>Email</th>
	<th>Művelet</th>
	
</tr>';
	$dbc = mysqli_connect(host,user,pw,db) or die('Nem sikerült!');
	mysqli_query($dbc,"SET NAMES utf8");
	
	$query = "SELECT nev, kerulet, utca, hazszam, csengo, telszam, email FROM cimek INNER JOIN userek ON (cimek.userid=userek.userid)";
	
	$lekerdezes = mysqli_query($dbc,$query);
	
	while ($adatok = mysqli_fetch_array($lekerdezes)){
		$nev = $adatok['nev'];
		$kerulet = $adatok['kerulet'];
		$utca = $adatok['utca'];
		$hazszam = $adatok['hazszam'];
		$csengo = $adatok['csengo'];
		$telszam = $adatok['telszam'];
		$email = $adatok['email'];
	if($allapot=='új'){
echo '
<tr>
	<td>' . $nev . '</td>
	<td>' . $kerulet . '</td>
	<td>' . $utca . '</td>
    <td>' . $hazszam . '</td>
	<td>' . $csengo . '</td>
	<td>' . $telszam . '</td>
	<td>' . $email . '</td>
	<td><a href="rendelesek.php">Vissza</a></td>
</tr>';}
	else if($allapot=='kész'){
echo '
<tr>
	<td>' . $nev . '</td>
	<td>' . $kerulet . '</td>
	<td>' . $utca . '</td>
    <td>' . $hazszam . '</td>
	<td>' . $csengo . '</td>
	<td>' . $telszam . '</td>
	<td>' . $email . '</td>
	<td><a href="rendelesek_kesz.php">Vissza</a></td>
</tr>';}
	else if($allapot=='törölt'){
echo '
<tr>
	<td>' . $nev . '</td>
	<td>' . $kerulet . '</td>
	<td>' . $utca . '</td>
    <td>' . $hazszam . '</td>
	<td>' . $csengo . '</td>
	<td>' . $telszam . '</td>
	<td>' . $email . '</td>
	<td><a href="rendelesek_hibas.php">Vissza</a></td>
</tr>';
	}}

?>
</table>
<?php
require_once('footer_rendeles.php');
?>