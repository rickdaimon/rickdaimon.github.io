<?php
include_once('../config/config.php');
include_once('../classes/phpmailer/api/api-debug.php');
if (isset($_POST['admin'])){
  $steamid = $_POST['steamid'];
  $admin = 1;
  $sql = "INSERT INTO `users`(steamid, admin) VALUES (:steamid, :admin)";
  $query = $db->prepare( $sql );
  $query->execute( array(':steamid'=>$steamid, ':admin'=>$admin));
}
if ($_POST['steamapi']){
	$steamapi = $_POST['steamapi'];
	$sql = "UPDATE settings SET steamapi='$steamapi' WHERE id=1";
    $row = $db->prepare($sql);
    $row->execute();
}
?>
<html>
<head>
<title >CSGO ROULETTE V1 INSTALLER</title>
	<meta charset="utf-8">
	<meta name="description" content="The most exclusive CS:GO betting platform with unique games &amp; a excellent community.">
	<meta name="fragment" content="!">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="shortcut icon" href="favicon.ico">
<link href="/template/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js" type="text/javascript"></script>
<style>
body{
	background: #2980b9;
}
.h3{
	color: #fefefe !important;
}
#installerbox{
	width: 50%;
	min-height: 250px;
	margin-left: auto;
	margin-right: auto;
	margin-top: 159px;
}
	
   #installerinput{
	height: 59px;
	margin-top: 15px;
}
#btn-installer{
	width: 49%;
	height: 59px;
	margin-top: 15px;
}
#btn-finish{
	width: 100%;
	height: 59px;
	margin-top: 15px;
}
</style>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<div id="installerbox">
<p class="h3 text-center">ADD SETTINGS</p><hr>
<form  action="" id="form" method="post">
<label class="label label-warning">1 step Important</label><input class="form-control" id="steamid" type="text" name="steamid" placeholder="SET SteamID64 TO MAKE ADMIN"/>
<div class="form-inline">
<button class="btn btn-success" id="btn-installer" name="admin" type="submit">Set Admin</button>
<button class="btn btn-danger" id="btn-installer" type="button" onclick="window.open('http://steamidfinder.com')">Where to find ?</button>
</div>
</form>
<form  action="" id="form" method="post">
<label class="label label-warning">2 step Important</label><input class="form-control" id="steamid" type="text" name="steamapi" placeholder="SET STEAM API KEY FOR LOGIN IN SITE"/>
<div class="form-inline">
<button class="btn btn-success" id="btn-installer" name="submit" type="submit">Set Steam Api</button>
<button class="btn btn-danger" id="btn-installer" type="button" onclick="window.open('https://steamcommunity.com/dev/apikey')">Where to find ?</button>
</div>
</form>
<button class="btn btn-success" id="btn-finish" type="button" onClick="window.location='../index.php';">3 STEP FINISH</button>
</div>
</div>
</div>
</div>
</body>
</html>