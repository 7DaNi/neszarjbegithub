﻿<!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="hu" />
<meta name="description" content="szakdolgozat">
<title>Szakdolgozat</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="swfobject.js"></script>
<script type="text/javascript" src="banner.js"></script>
<script type="text/javascript" src="ellenor.js"></script>
</head>
<body>
<?php
session_start();
require_once('connect.php');
?>
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
<a href="index.php">Főoldal</a> I
<a href="logout_session.php">Kilépés</a>
</div>';
}
?>
