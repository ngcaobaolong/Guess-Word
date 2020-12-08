<?php
error_reporting(0);
include("config.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($check_username = $conn->prepare("SELECT count(*) AS userCount FROM users WHERE userName = ?")) {
        $check_username->bind_param('s',$_POST['username']);
        $check_username->execute();
        $result = $check_username->get_result();
        if ($result->fetch_array(MYSQLI_ASSOC)['userCount'] > 0) {
            echo "0";
            exit;
        }
    }
    $username = $_POST['username'];
    $password = hash('sha512', $_POST['password']);
    $email = $_POST['email'];
    if ($stmt = $conn->prepare("INSERT INTO users (userName,userEmail,userPassword) VALUES (?,?,?)")) {
        $stmt->bind_param('sss',$username,$email,$password);
        $stmt->execute();
        echo "1";
    } else echo "0";
};
