<?php
	ini_set('display_errors',0);
	ini_set('display_startup_errors',0);
	error_reporting(0);
	
	$dbname = '#dbname#';
	$dbhost = '#dbhost#';
	$dbuser = '#dbuser#';
	$dbpassword = '#dbpassword#';

	try {
		$db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	} catch (PDOException $e) {
	    header('Location: ../installation/installer.php');
		//exit($e->getMessage());
	}
	
	$request  = str_replace("", "", $_SERVER['REQUEST_URI']); 
	$params     = explode("/", $request); 
     $sql = $db->query('SELECT sitename, ip, min, referal, steamapi, googleapisecret, googleapisite FROM `settings` WHERE id=1');
     $row = $sql->fetchAll();
     $users = array();
	 foreach ($row as $key => $value) {
		 $sitename = $value['sitename'];
		 $ip = $value['ip'];
		 $min = $value['min'];
		 $referal_summa = $value['referal'];
		 $steamapi = $value['steamapi'];
		 $googleapisecret = $value['googleapisecret'];
		 $googleapisite = $value['googleapisite'];
	 } 
	$baseurl = preg_replace('/www\./i', '', $_SERVER['SERVER_NAME']); //if you want to add custom baseurl make $baseurl = YOU URL;

?>