<?php
$sql = $db->query('SELECT * FROM `trades`');
$row = $sql->fetchALL();
$tradescount = count ($row);
?>