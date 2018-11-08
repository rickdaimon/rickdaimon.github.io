<?php
include_once('../../config/config.php');
$sql = $db->query('SELECT id, steamid, name, balance FROM `users` ORDER BY `balance` DESC limit 5');
$row = $sql->fetchAll();
$users = array();
?>