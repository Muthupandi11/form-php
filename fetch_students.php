<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "student_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed");
}

$sql = "SELECT * FROM students WHERE delflag = 0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['rollno']}</td>
            <td>{$row['department']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone']}</td>
            <td>
                <a href='edit.php?id={$row['id']}'><i class='fa-solid fa-pen'></i> Edit</a> ||
                <a href='delete.php' class='deleteBtn' data-id='{$row['id']}'><i class='fa-solid fa-trash'></i> Delete</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No records found</td></tr>";
}

$conn->close();
?>
