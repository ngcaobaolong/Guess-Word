<?php
error_reporting(0);
include("config.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($stmt = $conn->prepare("SELECT count(*) AS userCount FROM users WHERE userName = ? AND userPassword = ?")) {
        $stmt->bind_param('ss',$_POST['username'],hash('sha512',$_POST['password']));
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->fetch_array(MYSQLI_ASSOC)['userCount'] > 0) {
            echo "1";
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['loggedin'] = true;
            exit;
        } else echo "0";
    }
}
