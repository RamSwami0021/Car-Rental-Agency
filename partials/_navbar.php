<?php
session_start();
$showuser = false;
$showadmin = false;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if (isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'user') {
        $showuser = true;
    } elseif (isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin') {
        $showadmin = true;
    }
}

echo '<nav>
    <div class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand text-white" href="index.php">Car Rental Agency</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="available.php">Available Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>';
if ($showuser) {
    echo '<li class="nav-item"><a class="nav-link" href="available.php">' . $_SESSION['username'] . '-User</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
}
if ($showadmin) {
    echo '<li class="nav-item"><a class="nav-link" href="adminDashboard.php">' . $_SESSION['username'] . '-Agency</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
}
if (!$showuser && !$showadmin) {
    echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="registration.php">Registration</a></li>';
    echo '<li class="nav-item"><a class="nav-link" href="admin-registration.php">Registration(Agency)</a></li>';
}

echo ' </ul>
                    <form class="form-inline my-2 my-lg-0">
                    </form>
                </div>
            </nav>
        </div>
    </div>
    <!-- header section end -->
    <div class="call_text_main">
        <div class="container">
            <div class="call_taital">
                <div class="call_text"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span
                            class="padding_left_15">Jaipur</span></a></div>
                <div class="call_text"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i><span
                            class="padding_left_15">(+91) 7412846037</span></a></div>
                <div class="call_text"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span
                            class="padding_left_15">ramswami0021@gmail.com</span></a></div>
            </div>
        </div>
    </div>
</nav>';
?>
