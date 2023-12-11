<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go-Surf Sri Lanka</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="surf_img/head_logo.png"/>

</head>
<body>
    <section class="header">
        <video autoplay loop muted plays-inline class="back-video">
            <source src="surf_vid/hero_video.mp4" type="video/mp4">
        </video>
        <nav id="navbar" class="fixed">
            <a href="index.php"><img src="surf_img/logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="">BOARDS</a></li>
                    <li><a href="">LOCATIONS</a></li>
                    <li><a href="">ABOUT US</a></li>
                    <li><a href="">CONTACT US</a></li>
                    <li class="login"><a href="login.php" class="login-button">LOGIN</a></li>
                    <li class="logout"><a href="logout_process.php" class="logout-button"></a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>SURF WITH US</h1>
            <p>Experience the thrill of riding the waves with our premium surfboards. Discover the perfect balance of performance and style for surfers of all levels. Book your board today and catch the waves of adventure! </p>
            <p class="after-text">You can experice the best surfing areas with us in <br><br>
                <span class="after-text-big"><b>Sri Lanka</b></span></p>
            <a href="" class="hero-btn">Visit Us To Know More</a>
        </div>
    </section>
    <!--------Boards-------->
    <section class="board">
        <div class="h1-p">
            <h1 class="board-h1">EXPERIENCE OUR PREMIUM BOARDS</h1>
            <p class="board-p">We got the best surfing boards in the world with various designs</p>
            <a href="" class="hero-btn2">Discover</a>
        </div>
        <div class="row">
            <div class="board-col">
                <h3>Imported</h3>
                <p>All Our Surf Boards Are imported from USA</p>
            </div>
            <div class="board-col">
                <h3>Quality Material</h3>
                <p>Surf Boards Are Made With Quality Timber</p>
            </div>
            <div class="board-col">
                <h3>Controllability</h3>
                <p>Experience the Immersive Controllability</p>
            </div>
        </div>
        <div class="row">
            <div class="board-col">
                <h3>Hand-Made</h3>
                <p>All Boards Are Carefully Hand-Crafted By the Best Surf Board Makers</p>
            </div>
            <div class="board-col">
                <h3>Colorful</h3>
                <p>Colourful Custom Boards To Choose</p>
            </div>
            <div class="board-col">
                <h3>Free Surf Board Wax!</h3>
                <p>No Need To Worry About Surfing Wax. <br>We Give Them Free!</p>
            </div>
        </div>
    </section>
    <!-------Locations------->
    <section class="locs">
        <h1>SRI LANKA'S BEST SURFING LOCATIONS</h1>
        <p>Arugam Bay - The world's renowned international surf competition venue in Sri Lanka <br>& we are available in other 2 locations</p>

        <div class="row">
            <div class="locs-col">
                <img src="surf_img/arugambay.jpg">
                <div class="layer">
                    <h3>ARUGAM BAY</h3>
                </div>
            </div>
            <div class="locs-col">
                <img src="surf_img/ahangama.jpg">
                <div class="layer">
                    <h3>AHANGAMA</h3>
                </div>
            </div>
            <div class="locs-col">
                <img src="surf_img/hikkaduwa.jpg">
                <div class="layer">
                    <h3>HIKKADUWA</h3>
                </div>
            </div>
        </div>
    </section>
    <!-------Facilities------->
    <section class="facilities">
        <h1 class="facilities-h1"><span class="facilities-h1-big">CAN'T SURF?</span>
            <br>DON'T WORRY! <br>TRAIN WITH US TODAY!</h1>
        <p>All Kids & Adults are welocme to train with us at our Surf Schools which are located in Arugam Bay, Ahangama & Hikkaduwa</p>
        <div class="row">
            <div class="facilities-col">
                <img src="surf_img/training.jpg">
                <h3>Trained By Professionals</h3>
                <p>You are trained by our best surfing trainers and you might have a chance to meet your favourite Surfing Legend</p>
            </div>
            <div class="facilities-col">
                <img src="surf_img/life-guard.jpg">
                <h3>Safety First</h3>
                <p>All trainees are trained in a safe environment</p>
            </div>
            <div class="facilities-col">
                <img src="surf_img/time.jpg">
                <h3>Easy Time Slots</h3>
                <p>We are open from 7.00am to 6.00pm everyday execept Special Holidays</p>
            </div>
        </div>
    </section>
    <!-------Testimonials------->
    <section class="testimonials">
        <h1>WHAT OUR CUSTOMERS SAY</h1>
        <p>Related things in here! Related things in here! Related things in here!</p>
        <div class="row">
            <div class="testimonial-col">
                <img src="surf_img/user1.jpg">
                <div>
                    <p>Wow! What an Experience. Got many memories.</p>
                    <h3>Christine Berkley</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
            </div>
            <div class="testimonial-col">
                <img src="surf_img/user2.jpg">
                <div>
                    <p>Wow! What an Experience. Got many memories.</p>
                    <h3>David Byer</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="testimonial-col">
                <img src="surf_img/user3.jpg">
                <div>
                    <p>Wow! What an Experience. Got many memories.</p>
                    <h3>John Baker</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
            </div>
            <div class="testimonial-col">
                <img src="surf_img/user4.jfif">
                <div>
                    <p>Wow! What an Experience. Got many memories.</p>
                    <h3>Maya Angelou</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
            </div>
        </div>
    </section>
    <!-------Call To Action------->
    <section class="cta">
        <h1>Reserve Your Board Today!<br>Anywhere From the World</h1>
        <a href="" class="hero-btn">Reserve Now</a>
    </section>
    <!-------Footer------->
    <section class="footer">
        <h4>About Us</h4>
        <p>"Surfing Enthusiasts, Passionate Instructors: <br> At GO-SURF, we are more than just a surf rental service. We are a community of dedicated surfers and experienced instructors, committed to sharing our love for the ocean and the art of surfing. Whether you're a beginner catching your first wave or an experienced surfer seeking new challenges, join us for an unforgettable surfing adventure. Let's ride the waves together!" <br><br>Follow us on:</p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
        </div>
        <p>Made with <i class="fa fa-heart"></i> by Group 15 23.1 FOC - NSBM</p>
    </section>
    <!-------JavaScript for Toggle Menu------->
    <script>
        var navLinks = document.getElementById("navLinks");
        function showMenu()
        {
            navLinks.style.right = "0";
        }
        function hideMenu()
        {
            navLinks.style.right = "-200px";
        }
    </script>
    <!-------JavaScript for Nav Bar------->
    <script>
        var prevScrollpos = window.pageYOffset;
    
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-100px";
            }
            prevScrollpos = currentScrollPos;
        }
    </script>

<?php
if (isset($_COOKIE['user_id']) || isset($_SESSION['user_id'])) {
    echo "
    <script>
        var loginButton =  document.querySelector('.login-button');
        
        loginButton.innerHTML = '';

        var logoutButton = document.querySelector('.logout-button');

        logoutButton.innerHTML = 'LOGOUT';

        logoutButton.addEventListener('click', () => {
            window.location.href = 'logout_process.php';   
        });
    </script>

    <style>
        .nav-links ul .login::after {
            background: transparent;
        }
    </style>
    ";
} else {
    echo "
    <style>
        .nav-links ul .logout::after {
            background: transparent;
        }
    </style>
    ";
}
?>
</body>
</html>