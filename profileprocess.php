<?php
session_start();
//report all PHP errors
error_reporting(E_ALL);

require("connection.php");
require("functions.php");

if (isset($_POST['update'])) {
    $userNewName = $_POST['UpdateUsername'];
    $userNewPass = $_POST['UserPassword'];
    $userNewNum  = $_POST['UserMobilenumber'];
    $userNewLoc  = $_POST['UserLocation'];

    // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    if (!isBlank($userNewName)) {
        // $sql = "";

        $loggedInUser = $_SESSION['user_name'];
        if (!isBlank($userNewPass)) {

            $encyptedPassword = encryptPassword($userNewPass);

            $sql = "UPDATE users SET name = '$userNewName', password = '$encyptedPassword',
            mobile_num = '$userNewNum',location = '$userNewLoc' WHERE name ='$loggedInUser'";
        } else {
            $sql = "UPDATE users SET name = '$userNewName',
            mobile_num = '$userNewNum',location = '$userNewLoc' WHERE name ='$loggedInUser'";
        }

        
        // $sql = "UPDATE users SET name = '$userNewName', password = '$userNewPass',
        // mobile_num = '$userNewNum',location = '$userNewLoc' WHERE name ='$loggedInUser'";
        $results = mysqli_query($con, $sql);
        if ($results == 1) {
            $_SESSION['user_name'] = $userNewName;
            header('Location:profile.php?success=userUpdated');
            die;
        } else {
            header('Location:profile.php?error=emptyNameAndPassword');
            die;
        }
    }
} else {
    header('Location:profile.php?error=emptyNameAndPassword');
    die;
}


