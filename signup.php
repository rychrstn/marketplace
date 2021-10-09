<?php
session_start();

require("connection.php");
require("functions.php");
$msg = '';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$user_name = $_POST['user_name'];
	$password = encryptPassword($_POST['password']);
	$location = $_POST['location'];
	$mobile = $_POST['mobile_num'];

	$check_duplicate_username = "SELECT name FROM users WHERE name = '$user_name' ";
	$result = mysqli_query($con, $check_duplicate_username);
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		$msg = "Username already taken!";
	} else {

		if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

			//save to database
			// $user_id = random_num(6);
			$query = "INSERT into users (name,password,location,mobile_num)
			VALUES ('$user_name','$password','$location','$mobile')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		} else {
			$msg = "Please enter some valid information!";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="main.css">
	<title>Sign up</title>
</head>

<body>
	<form method="post">
		<a href="index.php"><img class="img-logo2" src="logo2.jpg"></a>
		<h1>Sign Up</h1>
		<div class="textBoxdiv">
			<input type="text" name="user_name" placeholder="Username" required>
		</div>
		<div class="textBoxdiv">
			<input type="password" name="password" placeholder="Password" required>
		</div>
		<div class="textBoxdiv">
			<input type="text" name="location" placeholder="Location" required>
		</div>
		<div class="textBoxdiv">
			<input type="text" name="mobile_num" placeholder="Mobile No." required>
		</div>
		<input type="submit" value="Signup" class="loginBtn">
		<div class="FieldError2"><?php echo $msg ?></div>
		<div class="signup">
			Already have an Account?
			</br>
			<a href="login.php">Log in</a>
		</div>
	</form>
</body>

</html>