<?php 
try{
	$dsn="mysql:host=localhost;dbname=php-pdo";
	$pdo = new pdo($dsn,"root","");
}catch(Exception $e){
	var_dump($e->getMessage());
}

$insert_sql = "INSERT INTO `crud` (`id`,`firstname`,`lastname`,`email`,`gender`,`age`) values (NULL,:firstname,:lastname,:email,:gender,:age)";
$insert = $pdo->prepare($insert_sql);
$firstname = "Lakshya";
$lastname = "Shah";
$email = "shahlakshya1988@gmail.com";
$gender  = "Male";
$age = "31";
$insert->bindParam(":firstname",$firstname);
$insert->bindParam("lastname",$lastname);
$insert->bindParam(":email",$email);
$insert->bindParam(":gender",$gender);
//$insert->bindParam(":age",$age);
$insert->bindValue(":age",31);
$result = $insert->execute();
var_dump($result);
echo "<br>";
var_dump($insert->rowCount());
echo "<br>";
var_dump($pdo->lastInsertId());

?>