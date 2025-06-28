<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'spacefinder');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $title = $_POST['propertyTitle'];
    $description = $_POST['propertyDescription'];
    $location = $_POST['propertyLocation'];
    $price = $_POST['propertyPrice'];
    $username = $_POST['username'];

    // Validate username
    $userCheck = $conn->query("SELECT username FROM users WHERE username = '$username'");
    if ($userCheck->num_rows === 0) {
        die("Error: The provided username does not exist.");
    }

    // Handle file upload
    $image = $_FILES['propertyImage'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imagePath = 'uploads/' . $imageName;
    move_uploaded_file($imageTmpName, $imagePath);

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO properties (title, description, location, price, image_path, username) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiss", $title, $description, $location, $price, $imagePath, $username);

    if ($stmt->execute()) {
        echo "Property added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close resources
    $stmt->close();
    $conn->close();
}
?>
