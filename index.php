<!DOCTYPE HTML>
<html>
<head>
<?php include_once("config.php"); ?>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <meta charset=utf-8>
 <meta http-equiv=X-UA-Compatible content="IE=edge"><meta name=description content="A front-end template that helps you build fast, modern mobile web apps.">
 <meta name=viewport content="width=device-width, initial-scale=1">
 <meta name=mobile-web-app-capable content=yes>
 <meta name=application-name content="Agilent">
 <link rel=icon sizes=192x192 href=images/touch/chrome-touch-icon-192x192.png>
 <meta name=apple-mobile-web-app-capable content=yes>
 <meta name=apple-mobile-web-app-status-bar-style content=black>
 <meta name=apple-mobile-web-app-title content="Agilent">
 <link rel=apple-touch-icon href=images/touch/apple-touch-icon.png>
 <meta name=msapplication-TileImage content=images/touch/ms-touch-icon-144x144-precomposed.png>
 <meta name=msapplication-TileColor content=#3372DF>
 <meta name=theme-color content=#3372DF>
 <link rel=stylesheet href=styles/main.css>
 <link rel="stylesheet" type="text/css" href="animate.css">
 <link rel="import" href="bower_components/paper-button/paper-button.html">
 <link rel="import" href="bower_components/core-icon-button/core-icon-button.html">
 <link rel="import" href="bower_components/core-icons/maps-icons.html">
 <link rel="import" href="bower_components/core-field/core-field.html">
 <link rel="import" href="bower_components/paper-input/paper-input.html">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="noty/packaged/jquery.noty.packaged.min.js"></script>
<script src="config.js"></script>
</head>
<body>
<header class="app-bar promote-layer"><div class=app-bar-container><button class=menu><img src=images/hamburger.svg alt=Menu></button><h1 class=logo>Centre de contrôle<strong> Bus</strong></h1><section class=app-bar-actions></section></div></header>
<nav class="navdrawer-container promote-layer"><h4>Navigation</h4><ul><li><a href="map.html">Carte</a></li><li><a href="ligne.html">Ligne</a></li><?php if(MODE_COMM == "socket") {echo"<li><a href='socket.html'>TCP</a></li>";} ?><li><a href="todo.html">TODO</a></li><li><a href="help.html">Aide</a></li></ul></nav>
<main>
<?php
if(isset($_GET["p"])) {
	$thePage = protectGet($_GET["p"]);
	include("_pages/".$thePage.".php");
}
else {
	include("_pages/map.php");
}

function protectGet($theLink) {
	$theLink = trim(strip_tags($theLink)); //Delete tags and space
	if(!get_magic_quotes_gpc()) {	//Check configuration server if Addslashes is OFF (We've need slashes before " and ' to protect our code)
		addslashes($theLink);	//Add slashes if GET contain " or '
	}	
	//$theLink = preg_replace("/[^A-Za-z]/i",'', $theLink); //Strict Filter : Filter protect accept only data A to Z and a to z. Max protection, de-comment if you want that
	return $theLink;
}
?>


</main><script src=scripts/main.min.js></script>
</body>
</html>