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
    <link rel="stylesheet" href="sell.css">
    <script src="https://kit.fontawesome.com/d29cb4cf2b.js" crossorigin="anonymous"></script>
</head>
<body>

    
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar__container">
        <a href="index1.php"><img class="img-logo1" src="logo1.jpeg"></a>
        <div class = "name"><?php echo "Welcome, " .$_SESSION['user_name']; ?></div>
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

<!--SELL UPLOAD SECTION-->
<?php

$msg = "";
//if upload button is pressed
if (isset($_POST['submit'])) 
{
    //the path to store the uploaded image
    $target = "./images/".basename($_FILES['image']['name']);

    //get all the submitted data from the form
    $categories = $_POST['categories'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $desc = $_POST['product_desc'];
    $user_id = $_SESSION['user_id'];


    $sql = "INSERT INTO products (category, price, img, description, user_id)
                          VALUES ('$categories', '$price', '$image', '$desc', '$user_id')";
    mysqli_query($con, $sql); //stores the submitted data into the database table: product

    //move the uploaded image into the folder: img
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
    {
        $msg = "Uploaded Succesfully";
    }else 
    {
        $msg = "There was a problem uploading Image";
    }


}
?>

<ul class="sell">Sell Product</ul>
<center>
    <div class="container">
    <form method = "post" action = "sell.php" id ="form_design" enctype="multipart/form-data">
    <div class="file_upload">
    <input type="file" name="image" accept="image/png, image/gif, image/jpeg">
    </div>
    <div class="sell_design">
    <label class="category "for="category">Select a category</label><br><br>
    <select class="prod" name="categories" id="product">
       <optgroup label="Electronics">
           <option value="Cellphone Accesories">Cellphone Gadgets</option>
        </optgroup> 
        <optgroup label="Clothing">
            <option value="Mens Wear">Mens Wear</option>
            <option value="Womens Wear">Women's Wear</option>
        </optgroup>
        <optgroup label="Accesories">
            <option value="Ring">Rings</option>
            <option value="Necklace">Necklace</option>
            <option value="Beauty Products">Beauty Products</option>
        </optgroup>
        <optgroup label="Parts">
            <option value="Household">Household</option>
            <option value="Car Parts">Car Parts</option>
            <option value="Computer Parts">Computer Parts</option>
        </optgroup>
    </select><br><br>
    <label class="desc" for="desc">Description</label><br><br>
    <textarea name="product_desc" id="" cols="30" rows="10" 
    placeholder="Describe what you are selling and include any details a buyer might be interested in. People love items with stories!"></textarea><br><br>
    <label class="price" for="price">Price</label><br><br>
    <textarea name="price" placeholder="Price for your listing"></textarea><br><br>
    <input class="list_item" type="submit" name="submit" value="List Now">
    <div class="notif">
    <?php echo $msg ?>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
</center>

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
                <p class="website__rights">?? Shopleaf 2021. All rights reserved</p>
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