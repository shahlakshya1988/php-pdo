<?php 
try{
	$dsn="mysql:host=localhost;dbname=php-pdo";
	$pdo = new pdo($dsn,"root","");
	
	$sql="SELECT * FROM `crud`";
	$query= $pdo->prepare($sql);
	$query->execute();
	$query->bindColumn("firstname",$fname);
	$query->bindColumn("lastname",$lname);
	$query->bindColumn("email",$emailid);
	$query->bindColumn(5,$maleorfemale); // do prefer column numbers
	while($row = $query->fetch(PDO::FETCH_OBJ)){
		echo "<pre>",print_r($row),"</pre>";
		echo "<br>";
		echo $fname." ".$lname." ".$emailid." ".$maleorfemale;
		echo "<br>";
	}
	
}catch(Exception $e){
	var_dump($e->getMessage());
}
?>