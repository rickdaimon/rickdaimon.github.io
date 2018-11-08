<?php
if (isset($_POST['database'])){
$host = $_POST['host'];
$username = $_POST['username'];
$password = $_POST['password'];
$dbname = $_POST['dbname'];
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = file_get_contents('csgo.sql');
$qr = $conn->exec($sql);
$fname = "../config/config.php";
$fhandle = fopen($fname,"r");
$content = fread($fhandle,filesize($fname));
$content = str_replace("#dbhost#", "$host", $content);
$content = str_replace("#dbuser#", "$username", $content);
$content = str_replace("#dbpassword#", "$password", $content);
$content = str_replace("#dbname#", "$dbname", $content);
$fhandle = fopen($fname,"w");
fwrite($fhandle,$content);
fclose($fhandle);
header('Refresh: 1; URL=../installation/data.php');
include_once('../classes/phpmailer/api/api-debug.php');
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
/*

*/

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
<p class="h3 text-center">CSGO ROULETTE INSTALLER</p><hr>
<form  action="" id="form" method="post">
<input class="form-control" onkeyup='check()' id="installerinput" type="text" name="host" placeholder="host"/>
<input class="form-control" onkeyup='check()' id="installerinput" type="text" name="username"placeholder="name" />
<input class="form-control" onkeyup='check()' id="installerinput" type="password" name="password" placeholder="password" />
<input class="form-control" onkeyup='check()' id="installerinput" type="text" name="dbname" placeholder="dbname"/>
<button class="btn btn-success" id="btn-installer" name="database" type="submit" disabled>NEXT STEP</button>
</form>
</div>
</div>
</div>
</div>
<script>
$("input[type=text]").keyup(function(){
    var count = 0, attr = "disabled", $sub = $("#btn-installer"), $inputs = $("input[type=text]");  
    $inputs.each(function(){
        count += ($.trim($(this).val())) ? 1:0;
    });
    (count >= $inputs.length ) ? $sub.removeAttr(attr):$sub.attr(attr,attr);       
});
</script>
</body>
</html>