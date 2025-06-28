<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer\autoload.php'; // Path to Composer's autoload file
require 'PHPMailer\PHPMailer\PHPMailer.php';
require 'PHPMailer\PHPMailer\Exception.php';
require 'PHPMailer\PHPMailer\SMTP.php';
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spacefinder";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$transaction_id = $_POST['transaction_id'] ?? '';
$booking_date = $_POST['booking_date'] ?? '';
$username = $_POST['username'] ?? '';
$room_type = $_POST['room_type'] ?? '';
$location = $_POST['location'] ?? '';

// Check if required fields are not empty
if (empty($transaction_id) || empty($booking_date) || empty($username) || empty($room_type) || empty($location)) {
    echo "<script>
            alert('Please fill in all the fields.');
            window.location.href = 'BookingPage.html';
          </script>";
    exit();
}

// Check if username exists in the users table and get the email
$sql_check_user = "SELECT email FROM users WHERE username = '$username'";
$result = $conn->query($sql_check_user);

if ($result->num_rows == 0) {
    echo "<script>
            alert('Username does not exist.');
            window.location.href = 'BookingPage.html';
          </script>";
    exit();
}

// Fetch user's email
$row = $result->fetch_assoc();
$user_email = $row['email'];

// Insert data into the bookings table
$sql = "INSERT INTO bookings (transaction_id, booking_date, username, room_type, location) 
        VALUES ('$transaction_id', '$booking_date', '$username', '$room_type', '$location')";

if ($conn->query($sql) === TRUE) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'joydasgupta78@gmail.com'; // Your email address
        $mail->Password = 'oico cnnk vinw lzsh'; // Your email password or app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('joydasgupta78@gmail.com', 'SpaceFinder Team');
        $mail->addAddress($user_email, $username);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Booking Confirmation';
        $mail->Body = "Dear $username,<br><br>
                       Thank you for your booking.<br><br>
                       <strong>Details:</strong><br>
                       Transaction ID: $transaction_id<br>
                       Booking Date: $booking_date<br>
                       Room Type: $room_type<br>
                       Location: $location<br><br>
                       We look forward to serving you.<br><br>
                       Regards,<br>
                       SpaceFinder Team";

        $mail->send();
        echo "<script>
                alert('Booking successful! Confirmation email sent.');
                window.location.href = 'BookingPage.html';
              </script>";
    } catch (Exception $e) {
        echo "<script>
                alert('Booking successful! However, the confirmation email could not be sent. Mailer Error: {$mail->ErrorInfo}');
                window.location.href = 'BookingPage.html';
              </script>";
    }
} else {
    echo "<script>
            alert('Error: " . $conn->error . "');
            window.location.href = 'BookingPage.html';
          </script>";
}

$conn->close();
?>
