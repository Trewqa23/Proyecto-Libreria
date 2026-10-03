<?php 



$sql_roles= "SELECT * FROM tb_roles ";
$query_roles = $pdo->prepare ($sql_roles);
$query_roles->execute();
$datosroles = $query_roles->fetchAll( PDO:: FETCH_ASSOC);







?>