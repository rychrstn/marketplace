<?php

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);

}

header("Location: index.php");
die;

//session_start();
//session_unset();
//session_destroy();
//header("Location: index.php");
//die;