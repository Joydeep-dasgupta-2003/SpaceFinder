<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql_check = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ss", $username, $email);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
                alert('Username or Email already exists!');
                window.location.href = 'LP After Login.php';
              </script>";
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Sign Up successful!');
                    window.location.href = 'LP After Login.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error: " . $conn->error . "');
                    window.location.href = 'LP After Login.php';
                  </script>";
        }
        $stmt->close();
    }
    $stmt_check->close();
}
$conn->close();
?>
