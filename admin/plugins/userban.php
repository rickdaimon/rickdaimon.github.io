<?php
if ($_POST['banid']){
	$steamid = $_POST['banid'];
	$sql = "UPDATE users SET ban='1' WHERE steamid=$steamid";
    $row = $db->prepare($sql);
    $row->execute();
}
?>