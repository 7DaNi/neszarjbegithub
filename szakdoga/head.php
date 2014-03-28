<!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="hu" />
<meta name="description" content="szakdolgozat">
<title>Szakdolgozat</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/banner.js"></script>
<script type="text/javascript" src="js/ellenor.js"></script>
</head>
<body>
<?php
session_start();
require_once('connect.php');
?>
<div id="body_bg">
<div id="header">
<?php 
if(!isset($_SESSION["user"]) && !isset($_SESSION["pw"])){
echo '<div id="header_menu">
<a href="index.php">Főoldal</a>
</div>';

}else{
	echo '<div id="header_menu">
<a href="index.php">Főoldal</a> I
<a href="logout_session.php">Kilépés</a>
</div>';
}
?>
<a href="penztar.php" id="header_basket">PÉNZTÁR</a>
<div id="main_menu">

   
	<a href="pizzak.php" id="pizzak">PIZZÁK</a>
    
    <a href="salatak.php" id="salatak">SALÁTÁK</a>
    
    <a href="desszertek.php" id="desszertek">DESSZERTEK</a>
    
    <a href="uditok.php" id="uditok">ÜDÍTŐK</a>
    
    <a href="kiegeszitok.php" id="kiegeszitok">KIEGÉSZÍTŐK</a>
    
<div style="clear: both"></div>
</div>
</div>
</div>
