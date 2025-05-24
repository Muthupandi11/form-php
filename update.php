<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "student_db";
$conn = new mysqli($host, $user, $pass, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE students SET name='$name', rollno='$rollno', department='$department', email='$email', phone='$phone' WHERE id=$id";

    if ($conn->query($sql)) {
        echo "<span style='color:green;'>Student updated successfully!</span>";
    } else {
        echo "<span style='color:red;'>Update failed: " . $conn->error . "</span>";
    }

    $conn->close();
}
?>
