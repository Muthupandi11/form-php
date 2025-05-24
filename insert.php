<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "student_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    http_response_code(500);
    echo "Database connection failed: " . $conn->connect_error;
    exit;
}
if (isset($_POST['name'], $_POST['rollno'], $_POST['department'], $_POST['email'], $_POST['phone'])) {
    
    $name = $conn->real_escape_string($_POST['name']);
    $rollno = $conn->real_escape_string($_POST['rollno']);
    $department = $conn->real_escape_string($_POST['department']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $sql = "INSERT INTO students (name, rollno, department, email, phone) 
            VALUES ('$name', '$rollno', '$department', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Student record added successfully!";
    } else {
        http_response_code(500);
        echo "❌ Error: " . $conn->error;
    }
} else {
    http_response_code(400);
    echo "❌ Missing required fields.";
}

$conn->close();
?>
