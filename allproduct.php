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

    <link rel = "stylesheet" href = "styles.css">
    <script src="https://kit.fontawesome.com/d29cb4cf2b.js" crossorigin="anonymous"></script>
</head>
<body style="background:wheat">

    
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar__container">
        <a href="index1.php"><img class="img-logo1" src="logo1.jpeg"></a>
        <a href="userprofile.php" class="user"><div class = "name"><?php echo "Welcome, " .$_SESSION['user_name']; ?></a>
        <a href="profile.php" class = "button1">Edit Profile</a>
        <form action="searchresult.php" method="POST" class="search_bar">
            <input type="text" name="search" placeholder="Search for items...">
            <button type="submit" name="submit-search">Search</button>
        </form>
        
        <!-- <?php 
        if(isset($_POST['submit-search'])) {
            $searchq = mysqli_real_escape_string($con, $_POST['search']);
            $sql = "SELECT * FROM users JOIN products ON products.user_id = users.id";
            $result = mysqli_query($con, $sql);
            $queryResult = mysqli_num_rows($result);

            if ($queryResult > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<div>
                            <h3>".$row['name']."</h3>
                            <h3>".$row['location']."</h3>
                            <h3>".$row['mobile_num']."</h3>
                            <h3>".$row['category']."</h3>
                            <h3>".$row['img']."</h3>
                            <h3>".$row['description']."</h3>
                            <h3>".$row['price']."</h3>
                        </div>";
                }
            }else{
                echo "There are no results matching your search!";
            }
        }
            // $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
            ?> -->

            <?php
            $sql = "SELECT * FROM users";
            $result = mysqli_query($con,$sql);
            $queryResult = mysqli_num_rows($result);

            if($queryResult > 0){
                $output = 'There was no search results!';
            }else{
                while ($row = mysqli_fetch_assoc($result)){
                        echo "<div>
                            <h3>".$row['name']."</h3>
                            <h3>".$row['location']."</h3>
                            <h3>".$row['mobile_num']."</h3>
                            <h3>".$row['category']."</h3>
                            <h3>".$row['img']."</h3>
                            <h3>".$row['description']."</h3>
                            <h3>".$row['price']."</h3>
                        </div>";
                }
            }
        
        ?>
        </div> 
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="index1.php" class="navbar__links" id="home-page"><i class="fas fa-home"></i>Home</a>
                </li>
                <li class="navbar__item">
                    <a href="sell.php" class="navbar__links" id="about-page">Sell</a>
                </li>
                <li class="navbar__btn">
                    <a href="index.php" class="button" id="signup">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ALL POSTED PRODUCTS -->
    <?php
     $sql = "SELECT * FROM products JOIN users ON products.user_id = users.id ORDER BY products.id DESC";
     $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result))
     {
         
         echo "<div class= tags>";
         echo "<div id='img_div'>"; echo "<br>";
         echo "Seller: {$row['name']}<br>";
         echo "Location: {$row['location']} <br>";
         echo "Mobile Number: {$row['mobile_num']} <br>";
         echo "Posted: {$row['time']} <br>";
         echo "<img class=\"item_img\" src='./images/".$row['img']."'>"; echo "<br>";
         echo "Category"; echo "<p>" .$row['category']."</p>"; echo "<br>";
         echo "Price"; echo "<p>" .$row['price']."</p>"; echo "<br>";
         echo "Description"; echo "<p>".$row['description']."</p>"; echo "<br>";
         echo "</div>";
         echo "</div>";
         
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
                    <a href="/">Careers</a>
                    <a href="/">Terms of service</a>
                </div>
                <div class="footer__link--items">
                    <h2>Contact Us</h2>
                    <a href="/">Contact</a>
                    <a href="/">Support</a>
                    <a href="/">Destinations</a>
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
                    <a href="https://www.facebook.com/vincent.vien.pagdato10" 
                    class="social__icon--link" target="_blank"
                    ><i class="fab fa-facebook"></i
                    ></a >
                    <a href="/" class="social__icon--link"
                    ><i class="fab fa-instagram"></i
                    ></a >
                    <a href="/" class="social__icon--link"
                    ><i class="fab fa-youtube"></i
                    ></a >
                    <a href="/" class="social__icon--link"
                    ><i class="fab fa-twitter"></i
                    ></a >
                </div>
            </div>
        </section>
    </div>




    <script src = "app.js"></script>
</body>
</html>