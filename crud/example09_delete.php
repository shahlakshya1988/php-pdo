<?php 
try{
	$dsn="mysql:host=localhost;dbname=php-pdo";
	$pdo = new pdo($dsn,"root","");
}catch(Exception $e){
	var_dump($e->getMessage());
}
$del_query = "DELETE FROM `crud` where `firstname` LIKE '%Lakshya%'";
$del = $pdo->exec($del_query);
var_dump($del); // number of records delete
?>