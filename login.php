<?php 
include 'partials/_database.php';
$login = false;
$invalid = false;
$pssInvalid = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (($username != null) && ($password != null)) {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            if ($row) {
                if (password_verify($password, $row['password'])) {
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['usertype'] = $row['usertype'];
                    if ($_SESSION['usertype'] == 'admin') {
                     header("location: adminDashboard.php");
                    } else {
                     header("location: available.php");
                    }
                } else {
                    $pssInvalid = true;
                }
            } else {
                $pssInvalid = true;
            }
        } else {
            $pssInvalid = true;
        }
    } else {
        $invalid = true;
    }
}    
?>
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
      <!-- Your HTML content here -->
      <div class="contact_section layout_padding">
      <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="contact_taital" style="color: #fe5b29;">Login</h1>
                </div>
            </div>
        </div>
      <div class="container">
         <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 pb-5">
               <div class="card mb-5">
                  <div class="card-body">
                     <form action="login.php" method="post">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                           <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" name="username" id="username">
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                           <div class="col d-flex justify-content-center">
                              <!-- Checkbox -->
                              <div class="form-check">
                                 <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                 <label class="form-check-label" for="form2Example31"> Remember me </label>
                              </div>
                           </div>
                           <div class="col">
                              <!-- Simple link -->
                              <a href="#!">Forgot password?</a>
                           </div>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" value="login" class="btn btn-block mb-4" style="background-color: #fe5b29;">Sign in</button>
                        <!-- Register buttons -->
                        <div class="text-center">
                           <p>Not a member? <a href="registration.php">Register</a></p>
                           <p>Not a member? <a href="admin-registration.php">Admin Register</a></p>
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
                 <div class="footeer_logo"><h1 class="text-white">Car Rental Agency</h1></div>
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
                    <p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but the majority </p>
                 </div>
                 <div class="col">
                    <h4 class="footer_taital">Helpful Links</h4>
                    <p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but the majority </p>
                 </div>
                 <div class="col">
                    <h4 class="footer_taital">Invesments</h4>
                    <p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but the majority </p>
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
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/jquery-3.0.0.min.js"></script>
      <script src="assets/js/plugin.js"></script>
      <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="assets/js/custom.js"></script>
   </body>
</html>