<?php
if ($_POST['steamid'] || ['balance']){
	$steamid = $_POST['steamid'];
	$balance = $_POST['balance'];
	$sql = "UPDATE users SET balance='$balance' WHERE steamid=$steamid";
    $row = $db->prepare($sql);
    $row->execute();
}
?>