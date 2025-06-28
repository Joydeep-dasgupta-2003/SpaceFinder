<?php
// logout.php
session_start();
session_destroy(); // Destroy all session data
header("Location: LP After Login.php"); // Redirect to the landing page
exit();
?>
