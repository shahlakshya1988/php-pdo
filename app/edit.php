<?php require_once "connect.php"; 
if(isset($_GET["edit"])){
	$id = trim($_GET["edit"]);
	$sel_query = "SELECT * FROM `crud` where `id` = :id";
	$sel=$db->prepare($sel_query);
	$sel->bindParam(":id",$id);
	$sel->execute();
	$sel->bindColumn("firstname",$fname);
	$sel->bindColumn("lastname",$lname);
	$sel->bindColumn("email",$emailaddress);
	$sel->bindColumn("age",$currentage);
	$sel->bindColumn("gender",$maleorfemale);
	$result= $sel->fetch(PDO::FETCH_OBJ);
}

if(isset($_POST["btnUpdatedUser"])){
	$firstname = trim($_POST["firstname"]);
	$lastname = trim($_POST["lastname"]);
	$email = trim($_POST["email"]);
	$age = trim($_POST["age"]);
	$gender = trim($_POST["gender"]);
	$update_query = "UPDATE `crud` SET
					`firstname` = :firstname,
					`lastname` = :lastname,
					`email` = :email,
					`age` = :age,
					`gender` = :gender
					WHERE `id` = :id ";
	$update = $db->prepare($update_query);
	$update->bindParam(":id",$id);
	$update->bindParam(":firstname",$firstname);
	$update->bindParam(":lastname",$lastname);
	$update->bindParam(":email",$email);
	$update->bindParam(":age",$age);
	$update->bindParam(":gender",$gender);
	
	$update->execute();
	if($update->rowCount()){
		echo "<h2>UPdated Successfully</h2>";
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
							<td><input type="text" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $fname; ?>" /></td>
						<tr>
						<tr>
							<td><label for="lastname">Last Name</label></td>
							<td><input type="text" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $lname; ?>" /></td>
						<tr>
						<tr>
							<td><label for="email">Email Address</label></td>
							<td><input type="email" name="email" id="email" placeholder="example@example.com" value="<?php echo $emailaddress ?>" /></td>
						</tr>
						<tr>
							<td><label for="gender">Gender</label></td>
							<td>
								<select name="gender" id="gender">
									<option value="Male"  <?php if("Male" == $maleorfemale){ echo "selected"; } ?> >Male</option>
									<option value="Female" <?php if("Female" == $maleorfemale){ echo "selected"; } ?> >Female</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="age">Age</label></td>
							<td>
								<select name="age" id="age">
									<?php for($i=18;$i<=50;$i++){ ?>
										<option value="<?php echo $i; ?>" <?php if($currentage==$i){ echo "selected"; } ?> ><?php echo $i; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="btnUpdatedUser" value="Update User" />
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>	
	</body>
</html>