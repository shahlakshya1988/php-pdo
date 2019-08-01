<?php 
try{
	$dsn="mysql:host=localhost;dbname=php-pdo";
	$pdo = new pdo($dsn,"root","");
}catch(Exception $e){
	echo $e->getMessage();
}

$insert = "INSERT INTO `crud` (`id`,`firstname`,`lastname`,`email`,`gender`,`age`) values(NULL,'Lakshya','Shah','shahlakshya1988@gmail.com','Male','31')";
$result = $pdo->query($insert);
var_dump($result);
var_dump($result->rowCount());
?>