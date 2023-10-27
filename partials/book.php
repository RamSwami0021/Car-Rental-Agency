<?php
include '_database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize user input
    $vehicleId = $_POST['vehicleId'];
    $bookingVehicleNumber = $_POST['bookingVehicleNumber'];
    $bookingDays = intval($_POST['bookingDays']); // Ensure it's an integer
    $bookingDate = $_POST['bookingDate'];

    // Insert booking details into the 'bookings' table
    $sql = "INSERT INTO bookings (vehicle_id, vehicle_number, booking_days, pickup_date) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Use "iiss" as the binding parameter string to match the data types
    $stmt->bind_param("iiss", $vehicleId, $bookingVehicleNumber, $bookingDays, $bookingDate);

    if ($stmt->execute()) {
        // Data inserted successfully; you can redirect to a success page or the available cars page.
        header('location:../available.php');
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
