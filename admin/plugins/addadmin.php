<?php
include_once ('../../config/config.php');
if ($_POST['addadmin']){
	$steamid = $_POST['addadmin'];
	$sql = "UPDATE users SET admin='1' WHERE steamid=$steamid";
    $row = $db->prepare($sql);
    $row->execute();
}
?>