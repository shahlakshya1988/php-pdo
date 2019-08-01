<?php 
try{
	require_once "pdo-connect.php";
}catch(Exception $e){
	var_dump($e->getMessage());
}
$query="SELECT * FROM `crud`";
$get_crud = $pdo->query($query);
if($get_crud){
	while($row = $get_crud->fetchAll()){
		var_dump($row);
	}
}else{
	echo $pdo->errorInfo()[2];
}


echo "<h2>Fetch All</h2>";
$get_crud = $pdo->query($query);
$rowFetchAll = $get_crud->fetchAll(PDO::FETCH_OBJ);
echo "<pre>",print_r($rowFetchAll),"</pre>";

echo "<h2>Fetch</h2>";
$get_crud = $pdo->query($query);
$row = $get_crud->fetch(PDO::FETCH_OBJ);
echo "<pre>",print_r($row),"</pre>";
?>