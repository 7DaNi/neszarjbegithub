<?php
require_once('head_admin.php');
?>
<h2>Pizza törlése</h2>
<div id="menupontok_top">
<ul>
<li><a href="ujpizzak_admin.php">ÚJ PIZZA HOZZÁADÁSA</a></li>
<ul>
</div>
<?php
if (isset($_GET['termekid']) && isset($_GET['etelnev'])){
	$termekid = $_GET['termekid'];
	$etelnev = $_GET['etelnev'];
}
 ?>
<div id="urlap"> 
<ul>
<form id="torles" name="termektorles" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<li><p>Biztosan törölni szeretné a következő terméket?</p></li>
<li><strong>Sorszám: <?php if (isset($termekid)){echo $termekid;} ?></strong></li>
<li><strong>Ételnév: <?php if (isset($etelnev)) {echo $etelnev;} ?></strong></li>
<input type="hidden" name="termekid" value="<?php if (isset($etelnev)) {echo $termekid;}?>"/>
<input type="submit" name="torles" value="Törlés" />
<a href="pizzak_admin.php"><input type="button" name="megsem" value="Mégsem" /></a>
</form>
</ul>
</div>
 <?php
 if (isset($_POST['torles'])){
	 $termekid = $_POST['termekid'];
	 
	 $dbc = mysqli_connect(host,user,pw,db) or die('Bukó');
	 mysqli_query($dbc,"SET NAMES utf8");
	 
	 $query = "DELETE FROM termekek WHERE termekid = '$termekid' LIMIT 1";
	 
	 mysqli_query($dbc,$query);
	 mysqli_close($dbc);
	 
	 $url = 'pizzak_admin.php';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
 }
require_once('footer.php');
?>
