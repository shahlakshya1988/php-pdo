<?php require_once "connect.php" ?>
<?php 
if(isset($_POST["btnSaveUser"])){
	$firstname = trim($_POST["firstname"]);
	$lastname = trim($_POST["lastname"]);
	$email = trim($_POST["email"]);
	$gender = trim($_POST["gender"]);
	$age = trim($_POST["age"]);
	
	$insert_query = "INSERT INTO `crud` (`id`,`firstname`,`lastname`,`email`,`gender`,`age`) values (:id,:firstname,:lastname,:email,:gender,:age)";
	$insert= $db->prepare($insert_query);
	$insert->bindValue(":id",NULL);
	$insert->bindParam(":firstname",$firstname);
	$insert->bindParam(":lastname",$lastname);
	$insert->bindParam(":email",$email);
	$insert->bindParam(":gender",$gender);
	$insert->bindParam(":age",$age);
	
	$result = $insert->execute();
	if($insert->rowCount()){
		echo "<h2>Insert Successfull</h2>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Document</title>
	</head>
	<body>
		<div class="container" style="max-width:640px;width:100%;margin-right:auto;margin-left:auto;">
			<form method="POST">
				<table style="width:100%;">
					<tbody>
						<tr>
							<td><label for="firstname">First Name</label></td>
							<td><input type="text" name="firstname" id="firstname" placeholder="First Name" /></td>
						<tr>
						<tr>
							<td><label for="lastname">Last Name</label></td>
							<td><input type="text" name="lastname" id="lastname" placeholder="Last Name" /></td>
						<tr>
						<tr>
							<td><label for="email">Email Address</label></td>
							<td><input type="email" name="email" id="email" placeholder="example@example.com" /></td>
						</tr>
						<tr>
							<td><label for="gender">Gender</label></td>
							<td>
								<select name="gender" id="gender">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="age">Age</label></td>
							<td>
								<select name="age" id="age">
									<?php for($i=18;$i<=50;$i++){ ?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="btnSaveUser" value="Add User" />
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>	
	</body>
</html>