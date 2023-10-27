<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Car_Rental_Agency";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // echo "Successfully connected to the MySQL server.<br>";
}

$sql = "CREATE DATABASE IF NOT EXISTS $database";
if (mysqli_query($conn, $sql)) {
    // echo "Database created successfully or already exists.<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

mysqli_select_db($conn, $database);

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    usertype VARCHAR(20) NOT NULL,
    password TEXT
)";
if (mysqli_query($conn, $sql)) {
    // echo "Table created successfully or already exists.<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS vehicles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vehicle_model VARCHAR(100) NOT NULL,
    vehicle_number VARCHAR(20) NOT NULL,
    seating_capacity INT(3) NOT NULL,
    rent_per_day DECIMAL(10, 2) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    // echo "Table created successfully or already exists.<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS bookings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vehicle_id INT(6) UNSIGNED NOT NULL,
    vehicle_number VARCHAR(20) NOT NULL,
    booking_days INT(3) NOT NULL,
    pickup_date DATE NOT NULL,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (vehicle_id) REFERENCES vehicles(id)
)";

// Execute the query
if (mysqli_query($conn, $sql)) {
    // echo "Table 'bookings' created successfully.";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
?>
