<?php 
try{
	require_once "pdo-connect.php";

}catch(Exception $e){
	$error = $e->getMessage();
}

$query = "SELECT * FROM `crud`";
foreach($pdo->query($query)  as $row){
	// echo "<pre>",print_r($row),"</pre><br>";
	echo $row["firstname"]." ".$row["lastname"]." ".$row["email"]."<br>";
}

?>