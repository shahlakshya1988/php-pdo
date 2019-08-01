<?php 
try{
	$dsn="mysql:host=localhost;dbname=php-pdo";
	$pdo = new pdo($dsn,"root","");
}catch(Exception $e){
	var_dump($e->getMessage());
}

$insert = "INSERT INTO `crud`(`id`,`firstname`,`lastname`,`email`,`gender`,`age`) values (NULL,'Lakshya','Shah','shahlakshya1988@gmail.com','Male','31')";

var_dump($pdo->exec($insert));
echo "<br>";
var_dump($pdo->lastInsertId());

?>