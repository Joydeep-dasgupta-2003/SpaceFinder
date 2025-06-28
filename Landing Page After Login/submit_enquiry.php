<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'spacefinder');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bookingDate = $_POST['bookingDate'];
    $roomType = $_POST['roomType'];
    $location = $_POST['location'];
    $specialRequests = $_POST['message'];

    // Validate required fields
    if (empty($roomType) || empty($location)) {
        echo "<script>
                alert('Error: Room Type and Location are required fields.');
                window.location.href = 'LP After Login.php';
              </script>";
        exit();
    }

    // Validate username
    $userCheck = $conn->query("SELECT username FROM users WHERE username = '$username'");
    if ($userCheck->num_rows === 0) {
        echo "<script>
                alert('Error: Username does not exist.');
                window.history.back();
              </script>";
        exit();
    }

    // Insert enquiry
    $stmt = $conn->prepare("INSERT INTO enquiries (username, email, phone, booking_date, room_type, location, special_requests) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $username, $email, $phone, $bookingDate, $roomType, $location, $specialRequests);

    if ($stmt->execute()) {
        echo "<script>
                alert('Enquiry submitted successfully.');
                window.location.href = 'LP After Login.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.history.back();
              </script>";
    }

    // Close resources
    $stmt->close();
    $conn->close();
}
?>
