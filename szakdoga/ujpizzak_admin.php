<?php
require_once('head_admin.php');
?>
<h2>Új pizza hozzáadása</h2>
<div id="menupontok_top">
<ul>
<li><a href="ujpizzak_admin.php">ÚJ PIZZA HOZZÁADÁSA</a></li>
<ul>
</div>
<div id="urlap">
<form id="reg" name="reg" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
<ul>
    <li><label>Ételnév: </label><input type="text" size="40" name="etelnev" /></li>
    <li><label>Leírás: </label><input type="text" size="40" name="leiras" /></li>
    <li><label>Kép: </label><input type="file" name="file" /></li>
    <input type="submit" name="kuldes" value="Küldés" />
    <input type="reset" name="torles" value="Törlés" />
</ul>    
</form>
</div>
<?php
	if (isset($_POST['kuldes'])){
		if (!empty($_POST['etelnev']) && !empty($_POST['leiras']) && !empty($_FILES['file']['name']))
		{
	$etelnev = $_POST['etelnev'];
	$leiras = $_POST['leiras'];
	
	
	$target = "kepek/pizzak/";
	$file_name = $_FILES['file']['name'];
	$tmp_dir = $_FILES['file']['tmp_name'];
	$ujnev = time().'.png';
	
	move_uploaded_file($tmp_dir, $target . $ujnev);
	$kep = $target . $ujnev;
		
		
	$dbc = mysqli_connect(host,user,pw,db) or die('Bukó!');
	$query = "INSERT INTO termekek (kategoria,etelnev,leiras,kep) VALUES ('pizzák','$etelnev','$leiras','$kep')";
	mysqli_query($dbc,"SET NAMES utf8");
	mysqli_query($dbc,$query);
	
	
	$url = 'pizzak_admin.php';
	 echo '<META http-equiv=Refresh CONTENT="0; URL='.$url.'">';
	
	}
	else {echo "Minden adatot ki kell tölteni!";}
	}
require_once('footer.php');
?>