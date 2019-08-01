<?php 
try{
	require_once "pdo-connect.php";
}catch(Exception $e){
	$errorMessage = $e->getMessage();
}

$query = "SELECT * FROM `crud`";
$get_crud = $pdo->query($query);
//var_dump($get_crud);
//var_dump($pdo->errorInfo());
if($get_crud){
	echo "<table border=\"0\" cellspacing=\"3\" cellpadding=\"3\">";
	while($row = $get_crud->fetch(PDO::FETCH_OBJ)){
		//var_dump($row);
		echo "<tr><td>{$row->firstname}</td>"." <td>{$row->lastname}</td> "."<td>{$row->email}</td>"."<td>{$row->gender}</td></tr>";
	}
	echo "</table>";
}else{
	echo $pdo->errorInfo()[2];
}


?>