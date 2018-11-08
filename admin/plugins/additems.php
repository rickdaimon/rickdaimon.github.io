<?php
if (isset($_POST['additems'])){
  $trade = $_POST['trade'];
	$market_hash_name = $_POST['market_hash_name'];
  $status = $_POST['status'];
  $img = $_POST['img'];
  $botid = $_POST['botid'];
  $sql = "INSERT INTO `items`(trade, market_hash_name, status, img, botid) VALUES (:trade, :market_hash_name, :status, :img, :botid)";
  $query = $db->prepare( $sql );
  $query->execute( array(':trade'=>$trade, ':market_hash_name'=>$market_hash_name, ':status'=>$status, ':img'=>$img, ':botid'=>$botid));
}
?>
