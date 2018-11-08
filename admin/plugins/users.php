<?php
$sql = $db->query('SELECT id, steamid, name, balance, ban FROM `users`');
$row = $sql->fetchAll();
$allusers = array();
?>