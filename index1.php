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
<body>

    
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="navbar__container">
        <a href="#home"><img class="img-logo1" src="logo1.jpeg"></a>
        <a href="userprofile.php" class="user"><div class = "name">
        <?php echo "Welcome, " .$_SESSION['user_name']; ?></a>
        <a href="profile.php" class = "button1">Edit Profile</a>
       
        </div> 
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="#home" class="navbar__links" id="home-page"><i class="fas fa-home"></i>Home</a>
                </li>
                <li class="navbar__item">
                    <a href="#about" class="navbar__links" id="about-page">Sell</a>
                </li>
                <li class="navbar__btn">
                    <a href="index.php" class="button" id="signup">Logout</a>
                </li>
            </ul>
        </div>
    </nav>  
    

    <!-- Hero Section -->
    <div class="hero" id="home">
        <div class="hero__container">
            <h1 class="hero__heading">Choose your<span> items</span></h1>
            <p class="hero__description">Transact •  Chat •  Deal</p>
            <button class="main__btn"><a href="allproduct.php">Explore</a></button>
        </div>
    </div>
    

    <!-- About Section -->
    <div class="main" id="about">
        <div class="main__container">
            <div class="main__img--container">
                <div class="main__img--card"><i class="fas fa-shopping-cart"></i></div>
            </div>
            <div class="main__content">
                <h1>what do we do?</h1>
                <h2>We help business scale</h2>
                <P>Sell your products here!</P>
                <button class="main__btn"><a href="sell.php">Sell</a></button>
            </div>
        </div>
    </div>


    <!-- Service Section
    <div class="services" id="services">
        <h1>Products</h1>
        <div class="services__wrapper">
            <div class="services__card">
                <h2>Electronics</h2>
                <p>Cellphone Gadgets</p>
                <div class="services__btn"><a href="electronics.php"><button>Get Started</button></a></div>
            </div>
            <div class="services__card">
                <h2>Clothing</h2>
                <p>Men's Wear / Women's Wear</p>
                <div class="services__btn"><a href="clothing.php"><button>Get Started</button></a></div>
            </div>
            <div class="services__card">
                <h2>Accesories</h2>
                <p>Rings / Necklace / Beauty Products</p>
                <div class="services__btn"><a href="accessories.php"><button>Get Started</button></a></div>
            </div>
            <div class="services__card">
                <h2>Parts</h2>
                <p>Household / Car parts / Computer Parts</p>
                <div class="services__btn"><a href="parts.php"><button>Get Started</button></a></div>
            </div>
        </div>
    </div> -->


    <!-- Features Section -->
   <!-- <div class="main" id="sign-up">
        <div class="main__container">
            <div class="main__content">
                <h1>Sign up now!</h1>
                <h2>Sign up Today</h2>
                <P>See what makes us different</P>
                <button class="main__btn"><a href="#">Sign up</a></button>
            </div>
            <div class="main__img--container">
                <div class="main__img--card" id="card-2">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
    </div>
--->

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


<!------------------MODAL------------------------->

    <!--<div class="modal" id="email-modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <div class="modal-content-left">
                <img src="images/pic1.svg" alt="">
            </div>
            <div class="modal-content-right">
                <form action="/" method="GET" class="modal-form" id="form">
                    <h1>Get Started with us today! Create your Account by filling out the information 
                        below.</h1>

                    <div class="form-validation">
                        <input type="text" class="modal-input" id="name" name="name" placeholder="Enter your Name">
                        <p>Error Message</p>
                    </div>

                    <div class="form-validation">
                        <input type="email" class="modal-input" id="email" name="email" placeholder="Enter your Email">
                        <p>Error Message</p>
                    </div>

                    <div class="form-validation">
                        <input type="password" class="modal-input" id="password" name="password" placeholder="Enter your Password">
                        <p>Error Message</p>
                    </div>

                    <div class="form-validation">
                        <input type="password" class="modal-input" id="password-confirm" name="password" placeholder="Confirm your Password">
                        <p>Error Message</p>
                    </div>
                    <input type="submit" class="modal-input-btn" value="Sign Up">
                    <span class="modal-input-login">Already have an Account? Login <a href="#">here</a></span>
                </form>
            </div>
        </div>
    </div> ------------------------>
    

    <script src = "app.js"></script>
</body>
</html>