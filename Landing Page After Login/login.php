<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            echo "<script>
                    alert('Login successful!');
                    window.location.href = 'LP After Login.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Invalid password!');
                    window.location.href = 'LP After Login.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('User not found!');
                window.location.href = 'LP After Login.php';
              </script>";
    }
    $stmt->close();
}
$conn->close();
?>
