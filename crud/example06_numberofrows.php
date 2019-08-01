<?php 
try{
	$dsn="mysql:host=localhost;dbname=php-pdo";
	$pdo = new pdo($dsn,"root","");
}catch(Exception $e){
	echo $e->getMessage();
}
$query = "SELECT * FROM `crud`";
$result = $pdo->query($query);
var_dump($result->rowCount());
echo "<br>Total Number Of Result : {$result->rowCount()}<br>";
?>