<?php

require("connection.php");



function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

// function random_num($length)
// {

// 	$text = "";
// 	if($length < 5)
// 	{
// 		$length = 5;
// 	}

// 	$len = rand(4,$length);

// 	for ($i=0; $i < $len; $i++) { 
// 		# code...

// 		$text .= rand(0,6);
// 	}

// 	return $text;
// }

function getUsersData($con, $user_name)
{
	// $id = getId($con, $idRaw);
	$array = array();
	$query = mysqli_query($con, "SELECT * FROM users WHERE name='.$user_name.'");
	// $query = mysqli_query($con, "SELECT * FROM users WHERE user_name='{$user_name}'");
	while ($row = mysqli_fetch_assoc($query)) 
	{
		//  $array['id'] = $row['id']; 

		//  echo "{$array['id']}";
		 $array['user_id'] = $row['user_id'];
		//   echo "{$array['user_id']}";n
		//  $array['user_name'] = "sadfasdasdasdasd";
		 $array['user_name'] = $row['user_name'];
		 $array['password'] = $row['password'];
		 $array['location'] = $row['location'];
		 $array['mobile_num'] = $row['mobile_num'];
		 $array['date'] = $row['date'];
		 
	}
	return $array;
}

// function getId($con, $user_name)
// {
// 	// echo $con;
// 	// $query = mysqli_query($con, "SELECT 'id' FROM 'users' WHERE 'user_name'='".$user_name."'");
// 	// echo  $query;
// 	// while ($row = mysqli_fetch_assoc($query))
// 	// {
// 	// 	return $row['id'];
// 	// }


// 	if ($result = mysqli_query($con, "SELECT * FROM users")) {
// 		echo "Returned rows are: " . mysqli_num_rows($result);
// 		// Free result set
// 		mysqli_free_result($result);
// 	  }
// 	// $test = "admin";
// 	// if ($query = mysqli_query($con, "SELECT * FROM 'users'")) {
// 	// 	echo  $query;
// 	// } else {
// 	// 	echo "no contents";
// 	// }
	
// 	// while ($row = mysqli_fetch_assoc($query))
// 	// {
// 	// 	return $row['id'];
// 	// }
	
// 	// echo "Returned rows are: " . mysqli_num_rows($query);
// 	// return mysqli_fetch_array($query);
// }

function encryptPassword($raw): string {
	return password_hash($raw, PASSWORD_BCRYPT);
}

// function convertToUnixTimeStamp($value){

// 	list($date, $time) = explode(' ', $value);
// 	list($year, $month, $day) = explode('-', $date);
// 	list($hour, $minutes, $seconds) = explode(':', $time);

// 	$unit_timestamp = mktime($hour, $minutes, $seconds, $month, $day, $year);

// 	return $unit_timestamp;
// }

// function convertToAgoFormat($timestamp) {
// 	$diffBtwCurrentTimeAndTimeStamp = time() - $timestamp;
// 	$periodsString = ["sec", "min", "hr", "day", "week", "month","year"];
// 	$periodsNumber = ["60", "60", "24", "7", "4.35", "12"];

// 	for($iterator = 0; $diffBtwCurrentTimeAndTimeStamp >= $periodsNumber[$iterator]; $iterator++)
// 		$diffBtwCurrentTimeAndTimeStamp /= $periodsNumber[$iterator];
// 		$diffBtwCurrentTimeAndTimeStamp = round($diffBtwCurrentTimeAndTimeStamp);

// 		if($diffBtwCurrentTimeAndTimeStamp !=1) $periodsString[$iterator].="s";

// 		$output = "$diffBtwCurrentTimeAndTimeStamp $periodsString[$iterator]"; //with "s"

// 		return "Posted ".$output." ago";
// }

// $unixTimeStamp = convertToUnixTimeStamp($time);

function isBlank(string $input): bool
{
    return empty($input) || ctype_space($input);
}

// define('USER_LEVEL_ADMIN', '1');
// function isAdmin() {
// 	if (isset($_SESSION['user_data']) && $_SESSION['user_data'] 
// 	&& USER_LEVEL_ADMIN == $_SESSION['user_data']['user_level'])
// 	{
// 		return true;
// 	}else{
// 		return false;
// 	}
// }