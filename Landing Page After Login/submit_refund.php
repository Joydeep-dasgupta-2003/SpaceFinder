<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'spacefinder');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $username = $_POST['username'];
    $amount = $_POST['amount'];
    $reason = $_POST['reason'];
    $bookingDate = $_POST['bookingDate'];
    $upiId = $_POST['upiId'];
    $phoneNumber = $_POST['phoneNumber'];

    // Validate username
    $userCheck = $conn->query("SELECT username FROM users WHERE username = '$username'");
    if ($userCheck->num_rows === 0) {
        echo "<script>
                alert('Error: The provided username does not exist.');
                window.history.back(); // Redirects back to the form
              </script>";
        exit();
    }

    // Insert refund request
    $stmt = $conn->prepare("INSERT INTO refunds (username, amount, reason, booking_date, upi_id, phone_number) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdssss", $username, $amount, $reason, $bookingDate, $upiId, $phoneNumber);

    if ($stmt->execute()) {
        echo "<script>
                alert('Refund request submitted successfully.');
                window.location.href = 'LP After Login.php'; 
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.history.back(); // Redirects back to the form
              </script>";
    }

    // Close resources
    $stmt->close();
    $conn->close();
}
?>
