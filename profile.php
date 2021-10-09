<?php
session_start();

require("connection.php");
require("functions.php");
$user_data = check_login($con);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopleaf</title>

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="profile.css">
    <script src="https://kit.fontawesome.com/d29cb4cf2b.js" crossorigin="anonymous"></script>
</head>

<body>


    <!-- NAVBAR -->

    <nav class="navbar">
        <div class="navbar__container">
            <a href="index1.php" id="navbar__logo">Shopleaf</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="index1.php" class="navbar__links" id="home-page"><i class="fas fa-home"></i>Home</a>
                </li>
                <li class="navbar__btn">
                    <a href="index.php" class="button" id="signup">Logout</a>
                </li>
            </ul>
        </div>
    </nav>




    <!--EDIT PROFILE-->



    <?php

    if ($_GET['success']) {
        if ($_GET['success'] == 'userUpdated') {
    ?>
            <script type="text/javascript">
                alert("User updated Succesfully");
                window.location = "profile.php";
            </script>
        <?php
        }
    }
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'emptyNameAndPassword') {
        ?>
            <script type="text/javascript">
                alert("Name and Password is Required!");
                window.location = "profile.php";
            </script>
        <?php
        }
        ?>
        <!-- <script type="text/javascript">
            alert("Maximum 5mb Image size is allowed");
            window.location = "profile.php";
        </script> -->
    <?php

    }
    ?>
    <form action="profileprocess.php" method="POST" enctype="multipart/form-data">


        <?php
        $currentUser = $_SESSION['user_name'];
        $sql = "SELECT * FROM users WHERE name = '$currentUser'";

        $result = mysqli_query($con, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    //print_r($row['user_name']);
        ?>
                    <ul class="profile">Profile Update</ul>
                    <center>
                        <div class="box">
                            <img src="profile1.jpg"></img>
                            <p class="info">Username</p>
                            <input type="text" name="UpdateUsername" class="form-control" placeholder="Username" value="<?php echo $row['name']; ?>">
                            <p class="info">Password</p>
                            <input type="password" name="UserPassword" placeholder="Enter new password">
                            <p class="info">Mobile Number</p>
                            <input type="text" name="UserMobilenumber" placeholder="Mobile Number" value="<?php echo $row['mobile_num']; ?>">

                            <p class="info">Location</p>
                            <input type="text" name="UserLocation" placeholder="Location" value="<?php echo $row['location']; ?>">

                            <!-- <button style="width: 50%; margin:auto;" class="btn_update">Change Pass</button> -->
                            <input type="submit" name="update" class="btn_update" value="Update">

                        </div>
                    </center>
    </form>
<?php
                }
            }
        }

?>




<!-- Footer Section -->
<div class="footer__container">
    <div class="footer__links">
        <div class="footer__links--wrapper">
            <div class="footer__link--items">
                <h2>About Us</h2>
                <a href="/">How it works</a>
                <a href="/">Testimonials</a>
                <a href="/">Terms of service</a>
            </div>
            <div class="footer__link--items">
                <h2>Contact Us</h2>
                <a href="/">Contact</a>
                <a href="/">Support</a>
            </div>
        </div>
        <div class="footer__link--wrapper">
            <div class="footer__link--items">
                <h2>Videos</h2>
                <a href="/">Submit Video</a>
                <a href="/">Ambassadors</a>
                <a href="/">Agency</a>
            </div>
            <div class="footer__link--items">
                <h2>Social Media</h2>
                <a href="https://www.facebook.com/vincent.vien.pagdato10">Facebook</a>
                <a href="/">Instagram</a>
                <a href="/">Youtube</a>
                <a href="/">Twitter</a>
            </div>
        </div>
    </div>
    <section class="social__media">
        <div class="social__media--wrap">
            <div class="footer__logo">
                <a href="#home" id="footer__logo">Shopleaf</a>
            </div>
            <p class="website__rights">© Shopleaf 2021. All rights reserved</p>
            <div class="social__icons">
                <a href="https://www.facebook.com/vincent.vien.pagdato10" class="social__icon--link" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="/" class="social__icon--link"><i class="fab fa-instagram"></i></a>
                <a href="/" class="social__icon--link"><i class="fab fa-youtube"></i></a>
                <a href="/" class="social__icon--link"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </section>
</div>

<script src="app.js"></script>
</body>

</html>