<?php
require_once('head_admin.php');
?>
<h2>Pizza módosítás</h2>
<div id="menupontok_top">
<ul>
<li><a href="ujpizzak_admin.php">ÚJ PIZZA HOZZÁADÁSA</a></li>
<ul>
</div>
<?php
	if (isset($_GET['termekid']) && isset($_GET['etelnev']) && isset($_GET['leiras']) && isset($_GET['kep'])){
	$termekid = $_GET['termekid'];
	$etelnev = $_GET['etelnev'];
	$leiras = $_GET['leiras'];
	$kep = $_GET['kep'];
	}
?>
<div id="urlap">
<form id="reg" name="reg" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<ul>
    <li><label>Ételnév: </label><input type="text" size="40" name="etelnev" value="<?php if (isset($etelnev)) {echo $etelnev;} ?>"/></li>
    <li><label>Leírás: </label><input type="text" size="40" name="leiras" value="<?php if (isset($leiras)) {echo $leiras;} ?>"/></li>
    <li><input type="hidden" name="kategoria" value="<?php if (isset($kategoria)) {echo $kategoria;} ?>" /></li>
    <li><input type="hidden" name="termekid" value="<?php if (isset($termekid)) {echo $termekid;} ?>" /></li>
    <li><img src="<?php echo $kep; ?>" width="300" height="300" /></li>
    <li><input type="submit" name="kuldes" value="Küldés" />
    <input type="reset" name="torles" value="Törlés" /></li>
    
    </ul>   
</form>
</div>
<?php
	if (isset($_POST['kuldes'])){
		if (!empty($_POST['etelnev']) && !empty($_POST['leiras']) && !empty($_POST['termekid']) && !empty($_POST['kep']))
		{
	$etelnev = $_POST['etelnev'];
	$leiras = $_POST['leiras'];
	$termekid = $_POST['termekid'];
	$kep = $_POST['kep'];

	//adatbázisba írás
	$dbc = mysqli_connect(host,user,pw,db);
	mysqli_query($dbc,"SET NAMES utf8");
	
	$query = "UPDATE termekek SET etelnev='$etelnev',leiras='$leiras', kep='$kep' WHERE termekid='$termekid' LIMIT 1";
	
	mysqli_query($dbc,$query);
	mysqli_close($dbc);
	  $url = 'pizzak_admin.php';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
		}
		else {echo "Minden adat kitöltése kötelező!";}
	}
require_once('footer.php');
?>
