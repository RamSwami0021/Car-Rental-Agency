<?php
include '_database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $vehicleModel = $_POST['vehicle-model'];
    $vehicleNumber = $_POST['vehicle-number'];
    $seatingCapacity = $_POST['seating-capacity'];
    $rentPerDay = $_POST['rent-per-day'];

    // Validate and sanitize the data if needed

    // Insert data into the database
    $sql = "INSERT INTO vehicles (vehicle_model, vehicle_number, seating_capacity, rent_per_day) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdd", $vehicleModel, $vehicleNumber, $seatingCapacity, $rentPerDay);

    if ($stmt->execute()) {
        // echo "Data inserted successfully!";
        header('location:../adminDashboard.php');
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
