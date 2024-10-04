<?php
session_start();

// Username dan password sdrhnaa
$username = "admin";
$password = "admin";

// Validasi input
if ($_POST['username'] == $username && $_POST['password'] == $password) {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
} else {
    header("Location: index.php?error=true");
}
?>
