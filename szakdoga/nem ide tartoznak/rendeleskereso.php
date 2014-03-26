<?php
require_once('connect.php');

if (isset($_GET['keresomezo'])) {
	$feltetel = $_GET['keresomezo'];
}
		
echo '
<table width="90%" cellpadding="0" cellspacing="0" border="1" align="center">
<tr bgcolor="#FFCC33">
	<th>Rendelésszám</th>
	<th>Név</th>
	<th>Dátum</th>
	<th>Állapot</th>
    <th>Művelet</th>
</tr>';
	$dbc = mysqli_connect(host,user,pw,db) or die('Nem jött be!');
	mysqli_query($dbc,"SET NAMES utf8");
	$query = "SELECT * FROM rendelesek WHERE rendelesid LIKE '%" . $feltetel . "%' OR userid LIKE '%" . $feltetel . "%' OR nev LIKE  '%" . $feltetel . "%'OR datum LIKE  '%" . $feltetel . "%'OR allapot LIKE  '%" . $feltetel . "%'";
	$lekerdezes = mysqli_query($dbc,$query);
	while ($adatok = mysqli_fetch_array($lekerdezes)){
		$rendelesid = $adatok['rendelesid'];
		$userid = $adatok['userid'];
		$nev = $adatok['nev'];
		$datum = $adatok['datum'];
		$allapot = $adatok['allapot'];
echo '
<tr>
	<td>' . $rendelesid . '</td>
	<td>' . $nev . '</td>
	<td>' . $datum . '</td>
    <td>' . $allapot . '</td>
	<td><a href="rendelestorles.php?rendelesid=' . $rendelesid . '&nev=' . $nev . '">Törlés</a> | <a href="rendeleskesz.php?rendelesid=' . $rendelesid . '">Kész</a>
	</td>

</tr>';
	}
	

?>
</table>
