<!DOCTYPE HTML>
<link href="style.css" rel="stylesheet" type="text/css" />
<div id="menu">

<ul>   
	<li><a href="pizzak.php">PIZZÁK</a></li>
    
    <li><a href="salatak.php">SALÁTÁK</a></li>
    
    <li><a href="desszertek.php">DESSZERTEK</a></li>
    
    <li><a href="uditok.php">ÜDÍTŐK</a></li>
    
    <li><a href="kiegeszitok.php">KIEGÉSZÍTŐK</a></li>
    
  <!--<li><a href="penztar.php">PÉNZTÁR</a></li>-->
</ul>
</div>
<?php 
if(!isset($_SESSION["user"]) && !isset($_SESSION["pw"])){
echo '<div id="teteje">
<a href="index.php">Főoldal</a>
</div>';

}else{
	echo '<div id="teteje">
<a href="index.php">Főoldal</a>I
<a href="logout_session.php">Kilépés</a>
</div>';
}
?>