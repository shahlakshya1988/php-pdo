<?php 
try{
	$ds = "mysql:host=localhost;dbname=php-pdo";
	$pdo = new pdo($ds,"root","");
}catch(Exception $e){
	var_dump($e->getMessage());
}

$query="SELECT * FROM `crud`";
$result = $pdo->query($query);
if($result){
	while($colrow = $result->fetchColumn(3)){
		echo "Email Address is : {$colrow}";
		echo "<br>";
	}
}else{
	echo $pdo->errorInfo()[2];
}
?>