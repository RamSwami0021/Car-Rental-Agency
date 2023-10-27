<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Car Rental Agency</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Raleway:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>

<body>
    <?php include("partials/_navbar.php"); ?>
    <!-- banner section start -->
    <div class="banner_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="banner_slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="banner_taital_main">
                                    <h1 class="banner_taital">Car Rent <br><span style="color: #fe5b29;">For You</span>
                                    </h1>
                                    <p class="banner_text">There are many variations of passages of Lorem Ipsum
                                        available, but the majority</p>
                                    <div class="btn_main">
                                        <div class="contact_bt"><a href="#">Read More</a></div>
                                        <div class="contact_bt active"><a href="#">Contact Us</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="banner_taital_main">
                                    <h1 class="banner_taital">Car Rent <br><span style="color: #fe5b29;">For You</span>
                                    </h1>
                                    <p class="banner_text">There are many variations of passages of Lorem Ipsum
                                        available, but the majority</p>
                                    <div class="btn_main">
                                        <div class="contact_bt"><a href="#">Read More</a></div>
                                        <div class="contact_bt active"><a href="#">Contact Us</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="banner_taital_main">
                                    <h1 class="banner_taital">Car Rent <br><span style="color: #fe5b29;">For You</span>
                                    </h1>
                                    <p class="banner_text">There are many variations of passages of Lorem Ipsum
                                        available, but the majority</p>
                                    <div class="btn_main">
                                        <div class="contact_bt"><a href="#">Read More</a></div>
                                        <div class="contact_bt active"><a href="#">Contact Us</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banner_img"><img src="assets/images/banner-img.png"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner section end -->
    <!-- about section start -->
    <div class="about_section layout_padding">
        <div class="container">
            <div class="about_section_2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image_iman"><img src="assets/images/about-img.png" class="about_img"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="about_taital_box">
                            <h1 class="about_taital">About <span style="color: #fe5b29;">Us</span></h1>
                            <p class="about_text">going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on
                                the Internet tend to repeat predefined going to use a passage of Lorem Ipsum, you need
                                to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem
                                Ipsum generators on the Internet tend to repeat predefined </p>
                            <div class="readmore_btn"><a href="#">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about section end -->
    <div class="search_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="search_taital">Search Your Best Cars</h1>
                    <p class="search_text">Using 'Content here, content here', making it look like readable</p>
                </div>
            </div>
        </div>
    </div>
    <!-- gallery section start -->
    <div class="gallery_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="gallery_taital">Our best offers</h1>
                </div>
            </div>
            <div class="gallery_section_2">
                <div class="row m-5">
                    <?php
                    include 'partials/_database.php';

                    // Perform a SQL query to retrieve the latest 6 vehicle entries
                    $sql = "SELECT * FROM vehicles ORDER BY id DESC LIMIT 6";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-md-4">
                <div class="gallery_box m-1 p-1">
                    <h4 class="types_text">' . $row['vehicle_model'] . '</h4>
                    <p class="looking_text">Start per day $' . $row['rent_per_day'] . '</p>
                    <div class="read_bt"><a href="available.php">View Details</a></div>
                </div>
            </div>';
                        }
                    } else {
                        echo '<div class="col-md-12">No vehicles found</div>';
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
        <!-- gallery section end -->
        <!-- choose section start -->
        <div class="choose_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="choose_taital">WHY CHOOSE US</h1>
                    </div>
                </div>
                <div class="choose_section_2">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon_1"><img src="assets/images/icon-1.png"></div>
                            <h4 class="safety_text">SAFETY & SECURITY</h4>
                            <p class="ipsum_text">variations of passages of Lorem Ipsum available, but the majority have
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <div class="icon_1"><img src="assets/images/icon-2.png"></div>
                            <h4 class="safety_text">Online Booking</h4>
                            <p class="ipsum_text">variations of passages of Lorem Ipsum available, but the majority have
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <div class="icon_1"><img src="assets/images/icon-3.png"></div>
                            <h4 class="safety_text">Best Drivers</h4>
                            <p class="ipsum_text">variations of passages of Lorem Ipsum available, but the majority have
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- choose section end -->
        <!-- client section start -->
        <div class="client_section layout_padding">
            <div class="container">
                <div id="custom_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="client_taital">What Says Customers</h1>
                                </div>
                            </div>
                            <div class="client_section_2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="client_taital_box">
                                            <div class="client_img"><img src="assets/images/client-img1.png"></div>
                                            <h3 class="moark_text">Hannery</h3>
                                            <p class="client_text">It is a long established fact that a reader will be
                                                distracted by the readable content of a page</p>
                                        </div>
                                        <div class="quick_icon"><img src="assets/images/quick-icon.png"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="client_taital_box">
                                            <div class="client_img"><img src="assets/images/client-img2.png"></div>
                                            <h3 class="moark_text">Channery</h3>
                                            <p class="client_text">It is a long established fact that a reader will be
                                                distracted by the readable content of a page</p>
                                        </div>
                                        <div class="quick_icon"><img src="assets/images/quick-icon.png"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="client_taital">What Says Customers</h1>
                                </div>
                            </div>
                            <div class="client_section_2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="client_taital_box">
                                            <div class="client_img"><img src="assets/images/client-img1.png"></div>
                                            <h3 class="moark_text">Hannery</h3>
                                            <p class="client_text">It is a long established fact that a reader will be
                                                distracted by the readable content of a page</p>
                                        </div>
                                        <div class="quick_icon"><img src="assets/images/quick-icon.png"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="client_taital_box">
                                            <div class="client_img"><img src="assets/images/client-img2.png"></div>
                                            <h3 class="moark_text">Channery</h3>
                                            <p class="client_text">It is a long established fact that a reader will be
                                                distracted by the readable content of a page</p>
                                        </div>
                                        <div class="quick_icon"><img src="assets/images/quick-icon.png"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="client_taital">What Says Customers</h1>
                                </div>
                            </div>
                            <div class="client_section_2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="client_taital_box">
                                            <div class="client_img"><img src="assets/images/client-img1.png"></div>
                                            <h3 class="moark_text">Hannery</h3>
                                            <p class="client_text">It is a long established fact that a reader will be
                                                distracted by the readable content of a page</p>
                                        </div>
                                        <div class="quick_icon"><img src="assets/images/quick-icon.png"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="client_taital_box">
                                            <div class="client_img"><img src="assets/images/client-img2.png"></div>
                                            <h3 class="moark_text">Channery</h3>
                                            <p class="client_text">It is a long established fact that a reader will be
                                                distracted by the readable content of a page</p>
                                        </div>
                                        <div class="quick_icon"><img src="assets/images/quick-icon.png"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#custom_slider" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#custom_slider" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- client section end -->
        <!-- contact section start -->
        <div class="contact_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="contact_taital">Get In Touch</h1>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="contact_section_2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mail_section_1">
                                <input type="text" class="mail_text" placeholder="Name" name="Name">
                                <input type="text" class="mail_text" placeholder="Email" name="Email">
                                <input type="text" class="mail_text" placeholder="Phone Number" name="Phone Number">
                                <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                                <div class="send_bt"><a href="#">Send</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact section end -->
        <!-- footer section start -->
        <div class="footer_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footeer_logo">
                            <h1 class="text-white">Car Rental Agency</h1>
                        </div>
                    </div>
                </div>
                <div class="footer_section_2">
                    <div class="row">
                        <div class="col">
                            <h4 class="footer_taital">Subscribe Now</h4>
                            <p class="footer_text">There are many variations of passages of Lorem Ipsum available,</p>
                            <div class="form-group">
                                <textarea class="update_mail" placeholder="Enter Your Email" rows="5" id="comment" name="Enter Your Email"></textarea>
                                <div class="subscribe_bt"><a href="#">Subscribe</a></div>
                            </div>
                        </div>
                        <div class="col">
                            <h4 class="footer_taital">Information</h4>
                            <p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but
                                the majority </p>
                        </div>
                        <div class="col">
                            <h4 class="footer_taital">Helpful Links</h4>
                            <p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but
                                the majority </p>
                        </div>
                        <div class="col">
                            <h4 class="footer_taital">Invesments</h4>
                            <p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but
                                the majority </p>
                        </div>
                        <div class="col">
                            <h4 class="footer_taital">Contact Us</h4>
                            <div class="location_text"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span class="padding_left_15">Jaipur</span></a></div>
                            <div class="location_text"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_15">(+91) 7412846037</span></a></div>
                            <div class="location_text"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left_15">ramswami0021@gmail.com</span></a></div>
                            <div class="social_icon">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer section end -->
        <!-- copyright section start -->
        <div class="copyright_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <p class="copyright_text">2023 All Rights Reserved. Design by <a href="https://ramswami0021.netlify.app/">Ram Swami with Love</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- copyright section end -->
        <!-- Javascript files-->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery-3.0.0.min.js"></script>
        <script src="assets/js/plugin.js"></script>
        <!-- sidebar -->
        <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="assets/js/custom.js"></script>
</body>

</html>