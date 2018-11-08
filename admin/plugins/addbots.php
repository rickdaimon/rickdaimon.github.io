<?php
include_once ('../../config/config.php');
if (isset($_POST['addbot'])){
	$name = $_POST['name'];
  $steamid = $_POST['steamid'];
  $shared_secret = $_POST['shared_secret'];
  $identity_secret = $_POST['identity_secret'];
  $accountName = $_POST['accountName'];
  $password = $_POST['password'];
  $sql = "INSERT INTO `bots`(name, steamid, shared_secret, identity_secret, accountName, password) VALUES (:name, :steamid, :shared_secret, :identity_secret, :accountName, :password)";
  $query = $db->prepare( $sql );
  $query->execute( array(':name'=>$name, ':steamid'=>$steamid, ':shared_secret'=>$shared_secret, ':identity_secret'=>$identity_secret, ':accountName'=>$accountName, ':password'=>$password));
}
?>
