<?php
try{
	$dsn="mysql:host=localhost;dbname=php-pdo";
	$db = new pdo($dsn,"root","");
}catch(Exception $e){
	echo $e->getMessage();
}
?>