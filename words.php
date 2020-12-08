<?php
include ("config.php");
if ($stmt = $conn->prepare("SELECT word FROM words ORDER BY RAND() LIMIT ?")) {
    $stmt->bind_param('i',$number);
    if (isset($_GET['number'])) {
        $number = $_GET['number'];
    }
    $stmt->execute();
    $myArray = array();
    $result = $stmt->get_result();
    while ($row = $result->fetch_row()) {
        $myArray[] = $row[0];
    }
    echo json_encode($myArray);
    $result->free();
} else echo "failed";
$conn->close();
