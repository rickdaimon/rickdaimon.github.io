<?php
$sql = $db->query('SELECT id, steamid, name, balance FROM `users`');
$row = $sql->fetchAll();
$allusers = array();
foreach ($row as $key => $value) {
	 $id = $value['id'];
	$name = $value['name'];
    $steamid = $value['steamid'];
	$balance = $value['balance'];
echo "    <tr>\n"; 
echo "      <th scope=\"row\">$id</th>\n"; 
echo "      <td>$steamid</td>\n"; 
echo "      <td>$name</td>\n"; 
echo "      <td>$balance</td>\n"; 
echo "	  <td><button class=\"btn btn-sm btn-success\" data-toggle=\"modal\" data-target=\"#$id\">Edit user</button></td>\n"; 
echo "    </tr>\n"; 
}
?>