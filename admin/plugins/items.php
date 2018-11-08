<?php
$sql = $db->query('SELECT id, img, market_hash_name, botid, status FROM `items`');
$row = $sql->fetchAll();
$allusers = array();
?>