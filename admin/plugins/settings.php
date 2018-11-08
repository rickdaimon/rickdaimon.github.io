<?php
if ($_POST['sitename']){
	$sitenames = $_POST['sitename'];
	$sql = "UPDATE settings SET sitename='$sitenames' WHERE id=1";
    $row = $db->prepare($sql);
    $row->execute();
}
if ($_POST['ip']){
	$ip = $_POST['ip'];
	$sql = "UPDATE settings SET ip='$ip' WHERE id=1";
    $row = $db->prepare($sql);
    $row->execute();
}
if ($_POST['referal']){
	$referal = $_POST['referal'];
	$sql = "UPDATE settings SET referal='$referal' WHERE id=1";
    $row = $db->prepare($sql);
    $row->execute();
}
if ($_POST['min']){
	$min = $_POST['min'];
	$sql = "UPDATE settings SET min='$min' WHERE id=1";
    $row = $db->prepare($sql);
    $row->execute();
}
if ($_POST['steamapi']){
	$steamapi = $_POST['steamapi'];
	$sql = "UPDATE settings SET steamapi='$steamapi' WHERE id=1";
    $row = $db->prepare($sql);
    $row->execute();
}
if ($_POST['googleapisecret']){
	$googleapisecret = $_POST['googleapisecret'];
	$sql = "UPDATE settings SET googleapisecret='$googleapisecret' WHERE id=1";
    $row = $db->prepare($sql);
    $row->execute();
}
if ($_POST['googleapisite']){
	$googleapisite = $_POST['googleapisite'];
	$sql = "UPDATE settings SET googleapisite='$googleapisite' WHERE id=1";
    $row = $db->prepare($sql);
    $row->execute();
}
?>