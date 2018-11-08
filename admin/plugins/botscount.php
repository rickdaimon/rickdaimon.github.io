<?php
$sql = $db->query('SELECT * FROM `bots`');
$row = $sql->fetchALL();
$botscount = count ($row);
?>