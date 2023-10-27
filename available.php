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
   <div class="gallery_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h1 class="gallery_taital">Our best offers</h1>
               <?php
               if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                  echo '<p class="text-center">You are login</p>';
               } else {
                  echo '<h4 class="text-center">You are not login.</h5>';
               } ?>
            </div>
         </div>
         <div class="gallery_section_2">
            <div class="row m-4 p-4">
               <?php
               include 'partials/_database.php';

               // Perform a SQL query to retrieve the latest 6 vehicle entries
               $sql = "SELECT * FROM vehicles ORDER BY id DESC";

               $result = mysqli_query($conn, $sql);

               if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                     echo '<div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title">' . $row['vehicle_model'] . '</h3>
                            <p class="card-text">Vehicle Number: ' . $row['vehicle_number'] . '</p>
                            <p class="card-text">Seating Capacity: ' . $row['seating_capacity'] . '</p>
                            <p class="card-text">Rent per Day: $' . $row['rent_per_day'] . '</p>';

                     // Show booking button only if the user is logged in
                     if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        if ($_SESSION['usertype'] == 'user') {
                           echo '<button class="btn btn-primary" data-toggle="modal" data-target="#bookingModal' . $row['id'] . '">Book Now</button>';
                        } else {
                           echo '<button class="btn btn-primary" data-toggle="modal" data-target="#bookingModal' . $row['id'] . '" disabled>Book Now</button>';
                        }
                     } else {
                        echo '<div class="read_bt"><a href="login.php">Book Now</a></div>';
                     }

                     echo '</div>
                    </div>
                </div>';

                     // Modal for booking form
                     echo '
                <div class="modal fade" id="bookingModal' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel' . $row['id'] . '" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bookingModalLabel' . $row['id'] . '">Booking Form</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="partials/book.php" method="post">
                            <div class="modal-body">
                                    <div class="form-group">
                                        <label for="bookingVehicleNumber">Vehicle Number</label>
                                        <input type="text" class="form-control" id="bookingVehicleNumber" name="bookingVehicleNumber" readonly value="' . $row['vehicle_number'] . '">
                                    </div>
                                    <div class="form-group">
                                        <label for="bookingDays">Number of Days</label>
                                        <input type="number" class="form-control" id="bookingDays" name="bookingDays">
                                    </div>
                                    <div class="form-group">
                                        <label for="bookingDate">Pickup Date</label>
                                        <input type="date" class="form-control" id="bookingDate" name="bookingDate">
                                    </div>
                                    <input type="hidden" name="vehicleId" value="' . $row['id'] . '">
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="submitBookingBtn">Submit Booking</button>
                                    </div>
                                    </form>
                        </div>
                    </div>
                </div>
                ';
                  }
               } else {
                  echo '<div class="col-md-12">No vehicles found</div>';
               }

               // Close the database connection
               //   mysqli_close($conn);
               ?>
            </div>
         </div>

      </div>
   </div>
   <!-- gallery section end -->
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