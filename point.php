<?php
error_reporting(0);
include("config.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($stmt = $conn->prepare("UPDATE users SET userPoint = userPoint + ? WHERE userName = ?")) {
        $stmt->bind_param('is', $_POST['point'], $_SESSION['username']);
        $stmt->execute();
        echo "1";
    } else echo "0";
} else echo "0";
