<?php

include('auth.php');
?>



<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!-- <title> Responsive Contact Us Form  | CodingLab </title>-->
    <link rel="stylesheet" href="contact.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="f.css">
</head>

<body>
    <!-- header -->
    <?php
include ('nav.php');

?>

    <!-- header end -->

    <!--- Top banner starte here --->

    <div class="container">

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/GT-Neo2.jpg" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/Nova-Y70.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/S1.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    </div>
    </div>
    </div>
    <br><br><br>
    <!-- end corsole -->


    <!--contact Form -->
    <div class="container">
        <div class="content">
            <div class="left-side">
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">Egy, Luxor</div>
                    <div class="text-two">Esna 72</div>
                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">+02 0112 090 1632</div>
                    <div class="text-two">+02 0103 036 6321</div>
                </div>
                <div class="email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic">Email</div>
                    <div class="text-one">Mahmoudnour0820@gmail.com</div>
                    <div class="text-two">M01120901632@gmail.com</div>
                </div>
            </div>
            <div class="right-side">
                <div class="topic-text">Send us a message</div>
                <p>If you have any work from me or any types of quries related to my tutorial, you can send me message
                    from here. It's my pleasure to help you.</p>
                <form action="#">
                    <div class="input-box">
                        <input type="text" placeholder="Enter your name">
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Enter your email">
                    </div>
                    <div class="input-box message-box">

                    </div>
                    <div class="button">
                        <input type="button" value="Send Now">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--End Contact form  -->

    <!-- testmonile start -->


    <section class="testimonial text-center">
        <div class="container">

            <div class="heading dark-heading">
                Testimonial
            </div>

            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="testimonial4_slide">
                        <img src="img/mah.png" class="img-circle img-responsive" />
                        <p>Full Stack Web Developer</p>
                        <h4>Mahmoud Nour Mohamed</h4>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        </div>
    </section>

    <!-- testmonile end -->

    <!-- footer start -->

    <div class="footer">
        <div class="containerr">
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-xs-12">
                    <div class="single_footer">
                        <h4>Services</h4>
                        <ul>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Simply dummy text</a></li>
                            <li><a href="#">The printing and typesetting </a></li>
                            <li><a href="#">Standard dummy text</a></li>
                            <li><a href="#">Type specimen book</a></li>
                        </ul>
                    </div>
                </div>
                <!--- END COL -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single_footer single_footer_address">
                        <h4>Page Link</h4>
                        <ul>
                            <li><a href="home.php">Home</a></li>
                            <li><a href="#">Products</a></li>
                            <li><a href="checkout.php">Cart </a></li>
                            <li><a href="#">Contect</a></li>
                            <li><a href="logout.php">logout</a></li>
                        </ul>
                    </div>
                </div>
                <!--- END COL -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single_footer single_footer_address">
                        <h4>Subscribe today</h4>
                        <div class="signup_form">
                            <form action="#" class="subscribe">
                                <input type="text" class="subscribe__input" placeholder="Enter Email Address">
                                <button type="button" class="subscribe__btn"><i class="fas fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="social_profile">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--- END COL -->
            </div>
            <!--- END ROW -->
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <p class="copyright">Copyright © 2022 <a href="#">Mahmoud Nour</a>.</p>
                </div>
                <!--- END COL -->
            </div>
            <!--- END ROW -->
        </div>
        <!--- END CONTAINER -->
    </div>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>

    <!-- footer End -->
</body>

</html>