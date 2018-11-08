<?php
$sql = $db->query('SELECT id, steamid, name, avatar FROM `users` WHERE admin=1');
$row = $sql->fetchAll();
$admin = array();
?>