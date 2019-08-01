<?php 
try{
	$dsn="mysql:host=localhost;dbname=php-pdo";
	$pdo = new pdo($dsn,"root","");
	$insert_query = "INSERT INTO `crud` (`id`,`firstname`,`lastname`,`email`,`gender`,`age`) values (NULL,?,?,?,?,?)";
	$insert = $pdo->prepare($insert_query);
	$firstname = "Lakshya";
	$lastname = "Shah";
	$email = "shahlakshya1988@gmail.com";
	$gender = "Male";
	$age = 31;
	$insert->bindParam(1,$firstname);
	$insert->bindParam(2,$lastname);
	$insert->bindParam(3,$email);
	$insert->bindParam(4,$gender);
	$insert->bindParam(5,$age);
	$insert_result = $insert->execute();
	var_dump($insert_result);
	echo "<br>";
	var_dump($insert->rowCount());
	echo "<br>";
	var_dump($pdo->lastInsertId());
	
}catch(Exception $e){
	var_dump($e->getMessage());
}
?>