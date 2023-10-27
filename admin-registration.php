<?php
include 'partials/_database.php';
$showAlert = false;
$passNotMatch = false;
$exitUser = false;
$nullError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordConfirm = $_POST["passwordConfirm"];
    $usertype = 'admin';

    if (($username != null) && ($password != null)) {
        $exitUserSql = "Select * from users where username='$username'";
        $result = mysqli_query($conn, $exitUserSql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $exitUser = true;
        } else {
            if ($password == $passwordConfirm) {
                $hasPass = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`username`, `email`, `password`, `usertype`) VALUES ('$username','$email', '$hasPass', '$usertype')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $showAlert = true;
                    header("location: login.php");
                }
            } else {
                $passNotMatch = true;
            }
        }
    } else {
        $nullError = true;
    }
}
?>
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
    <div class="header_section">
        <div class="contact_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="contact_taital" style="color: #fe5b29;">Agency Registration</h1>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 pb-5">
                        <div class="card mb-5">
                            <div class="card-body">
                                <form action="admin-registration.php" method="post">
                                    <!-- Name input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form2Example1" class="form-control" name="username" required />
                                        <label class="form-label" for="form2Example1">Username</label>
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" id="form2Example2" class="form-control" name="email" required />
                                        <label class="form-label" for="form2Example2">Email address</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form2Example3" class="form-control" name="password" required />
                                        <label class="form-label" for="form2Example3">Password</label>
                                    </div>

                                    <!-- Confirm Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form2Example4" class="form-control" name="passwordConfirm" required />
                                        <label class="form-label" for="form2Example4">Confirm Password</label>
                                    </div>

                                    <!-- Checkbox for terms and conditions -->
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="form2Example5" name="agree_terms" required />
                                        <label class="form-check-label" for="form2Example5">Agree to Terms and
                                            Conditions</label>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-block mb-4" style="background-color: #fe5b29;">Register</button>

                                    <!-- Login link -->
                                    <div class="text-center">
                                        <p>Already have an account? <a href="login.php">Login</a></p>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
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