<?php
$servername = "localhost";
$username = "root";
$password = "Manikeerthu@1234";
$dbname = "gas_sensor_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from ESP32
$gas_level = $_POST['gas_level'];

$sql = "INSERT INTO gas_readings (gas_level) VALUES ('$gas_level')";

if ($conn->query($sql) === TRUE) {
    echo "Data saved successfully";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
