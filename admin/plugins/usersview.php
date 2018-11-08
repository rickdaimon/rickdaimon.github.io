<?php
$sql = $db->query('SELECT * FROM `users`');
$row = $sql->fetchALL();
$usercount = count ($row);
?>