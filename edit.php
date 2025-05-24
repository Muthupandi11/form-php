<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "student_db";
$conn = new mysqli($host, $user, $pass, $dbname);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM students WHERE id=$id");
    $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <script src="assets/js/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
        }
        .form-container {
            width: 400px;
            margin: 80px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h2 {
            text-align: center;
        }
        input[type=text], input[type=email] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        button {
            margin-left: 120px;
            width: 150px;
            padding: 10px;
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #218838;
        }
        #msg {
            text-align: center;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Edit Student Info</h2>
    <form id="updateForm">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <input type="text" name="name" value="<?= $row['name'] ?>" required><br>
        <input type="text" name="rollno" value="<?= $row['rollno'] ?>" required><br>
        <input type="text" name="department" value="<?= $row['department'] ?>" required><br>
        <input type="email" name="email" value="<?= $row['email'] ?>" required><br>
        <input type="text" name="phone" value="<?= $row['phone'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
    <div id="msg"></div>
</div>

<script>
$(document).ready(function () {
    $('#updateForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: 'update.php',
            type: 'POST',
            data: $('#updateForm').serialize(),
            success: function (response) {
                $('#msg').html(response);
                setTimeout(() => {
                    window.location.href = 'view.php';
                }, 1500);
            },
            error: function () {
                $('#msg').html("Failed to update student.");
            }
        });
    });
});
</script>
</body>
</html>
