<?php
$sql = $db->query('SELECT id, steamid, accountName, password, shared_secret, identity_secret, name FROM `bots`');
$row = $sql->fetchAll();
$allusers = array();
?>