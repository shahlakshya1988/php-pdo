<?php 
try{
	require_once "pdo-connect.php";
}catch(Exception $e){
	$errorMessage = $e->getMessage();
}
$query="SELECT * FROM `crud`"; // this table name has error
$rows = $pdo->query($query);

$sqlError = $pdo->errorInfo();
$sqlErrorMessage = '';
if(isset($sqlError[2])){
	$sqlErrorMessage = $sqlError[2];
}
var_dump($sqlErrorMessage);
if(!isset($sqlError[2])){
	foreach($rows as $row){
		echo "<pre>",print_r($row),"</pre><br>";
	}
}
?>