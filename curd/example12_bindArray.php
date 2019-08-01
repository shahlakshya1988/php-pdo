<?php 
try{
	$dsn="mysql:host=localhost;dbname=php-pdo";
	$pdo = new pdo($dsn,"root","");
	$insert_query = "INSERT INTO `crud` (`id`,`firstname`,`lastname`,`email`,`gender`,`age`) values (NULL,:fistname,:lastname,:email,:gender,:age)";
	$insert = $pdo->prepare($insert_query);
	$firstname = "Lakshya";
	$lastname = "Shah";
	$email = "shahlakshya1988@gmail.com";
	$gender = "Male";
	$age = 31;
	$values = array(":fistname"=>$firstname,
					":lastname"=>$lastname,
					":email"=>$email,
					":gender"=>$gender,
					":age"=>32);

	$insert_result = $insert->execute($values);
	var_dump($insert_result);
	echo "<br>";
	var_dump($insert->rowCount());
	echo "<br>";
	var_dump($pdo->lastInsertId());
	
}catch(Exception $e){
	var_dump($e->getMessage());
}
?>