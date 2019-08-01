<?php require_once "connect.php";
if(isset($_GET["delete"])){
	$id = trim($_GET["delete"]);
	$del_query = "DELETE FROM `crud` where `id` = :id ";
	$delete = $db->prepare($del_query);
	$value = array(":id"=>$id);
	$delete->execute($value);
	if($delete->rowCount()){
		echo "<h2>Row Deleted</h2>";
	}
}


 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>View Records</title>
	</head>
	<body>
		<div class="container" style="max-width:992px;width:100%;margin-right:auto;margin-left:auto;">
			<table style="width:100%;">
				<thead>
					<tr>
						<th>Id.</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Age</th>
						<th>Extra</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$select_query = "SELECT * FROM `crud`";
					$result_crud = $db->query($select_query);
					while($row = $result_crud->fetch(PDO::FETCH_OBJ)){
						echo "<tr>";
							echo "<td>{$row->id}</td>";
							echo "<td>{$row->firstname}</td>";
							echo "<td>{$row->lastname}</td>";
							echo "<td>{$row->email}</td>";
							echo "<td>{$row->gender}</td>";
							echo "<td>{$row->age}</td>";
							echo "<td><a href=\"edit.php?edit={$row->id}\">Edit User</a> <br> <a href=\"view.php?delete={$row->id}\">Delete User</a></td>";
						echo "</tr>";
					}
				?>
					
				</tbody>
				<tfoot>
					<tr>
						<th>Id.</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Age</th>
						<th>Extra</th>
					</tr>
				</tfoot>
			</table>
		</div>
		<!-- div.container -->
	</body>
</html>