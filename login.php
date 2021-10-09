<?php

session_start();	

require("connection.php");
require("functions.php");
$msg = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	//something was posted
	$user_name = $_POST['user_name'];
	$password =  $_POST['password'];
	
	if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

		//read from database
		$query = "SELECT * FROM users WHERE name = '$user_name' limit 1";
		$result = mysqli_query($con, $query);


		if ($result) {
			if ($result && mysqli_num_rows($result) > 0) {
				$user_data = mysqli_fetch_assoc($result);
				
				if (password_verify($password, $user_data['password'])) {

					$_SESSION['user_id'] = $user_data['id'];
					$_SESSION['user_name'] = $user_name;
					header("Location: index1.php");
					die;
				}
				else {
					$msg = "Wrong Username or Password!";
				}
			}
		}

		$msg = "Wrong Username or Password!";
	} else {
		$msg = "Wrong Username or Password!";
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
	<title>Login</title>
</head>

<body>
	<form method="POST">
		<a href="index.php"><img class="img-logo2" src="logo2.jpg"></a>
		<h1>Login</h1>
		<div class="textBoxdiv">
			<input type="text" name="user_name" placeholder="Username" required>
		</div>
		<div class="textBoxdiv">
			<input type="password" name="password" placeholder="Password" required>
		</div>
		<input type="submit" value="Login" class="loginBtn">
		<div class="FieldError"><?php echo $msg ?></div>
		<div class="signup">
			Don't have an Account?
			</br>
			<a href="signup.php">Sign up</a>
		</div>
	</form>
</body>

</html>