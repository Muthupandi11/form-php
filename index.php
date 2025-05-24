<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
    <link rel="stylesheet" href="style.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>
    <div class="form-container">
        <h2>Student Registration</h2>
        <form id="studentForm">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Name" required>

            <label for="rollno">Roll No:</label>
            <input type="text" id="rollno" name="rollno" placeholder="Enter Roll No" required>

            <label for="department">Department:</label>
            <input type="text" id="department" name="department" placeholder="Enter Department" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Enter Email Address" required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter Phone Number" required>

            <button type="submit">Add</button>
        </form>
        <div id="message" style="text-align:center; color: green;"></div>
        <p style="text-align:center;"><a href="view.php">VIEW || UPDATE || DELETE</a></p>
    </div>

    <script>
    $(document).ready(function() {
        $('#studentForm').on('submit', function(e) {
            e.preventDefault(); 
            $.ajax({
                url: 'insert.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#message').html(response);
                    $('#studentForm')[0].reset();
                },
                error: function() {
                    $('#message').html('Something went wrong. Please try again.');
                }
            });
        });
    });
    </script>
           
</body>
</html>
