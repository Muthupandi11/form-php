<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
        }
        table {
            margin: 50px auto;
            border-collapse: collapse;
            width: 90%;
            background: #fff;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background: #007bff;
            color: white;
        }
        h2 {
            text-align: center;
            margin-top: 30px;
        }
        button {
            background-color: white;
            width: 80px;
            height: 30px;
            margin-left: 700px;
            border-radius: 8px;
        }
        button a {
            color: blue;
            text-decoration: none;
        }
        button:hover {
            background-color: yellow;
        }
    </style>
</head>
<body>

<h2>Student Records</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Roll No</th>
            <th>Department</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="studentData">
        
    </tbody>
</table>

<button><a href="index.php">BACK</a></button>

<script>
$(document).ready(function() {
    function loadStudents() {
        $.ajax({
            url: "fetch_students.php",
            method: "GET",
            success: function(data) {
                $('#studentData').html(data);
            },
            error: function() {
                $('#studentData').html('<tr><td colspan="7">Failed to load data</td></tr>');
            }
        });
    }

    loadStudents(); 

    $(document).on('click', '.deleteBtn', function(e) {
        e.preventDefault();
        if (confirm("Are you sure you want to delete this student?")) {
            const studentId = $(this).data('id');

            $.ajax({
                url: 'delete.php',
                type: 'POST',
                data: { id: studentId },
                success: function(response) {
                    alert(response);
                    loadStudents(); 
                },
                error: function(xhr) {
                    alert("Delete failed: " + (xhr.responseText || "Unknown error"));
                }
            });
        }
    });
});
</script>

</body>
</html>
