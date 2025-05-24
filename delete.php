<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "student_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo "Database connection failed";
    exit;
}

if (isset($_POST['id'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $sql = "UPDATE students SET delflag = 1 WHERE id = $id";

    if ($conn->query($sql)) {
        echo "Student deleted successfully.";
    } else {
        http_response_code(500);
        echo "Delete failed: " . $conn->error;
    }
} else {
    http_response_code(400);
    echo "Invalid request.";
}

$conn->close();
?>
