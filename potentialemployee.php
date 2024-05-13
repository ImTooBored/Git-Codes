<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Application Form</title>
</head>
<body>
    <h2>Company Application Form</h2>
    <form action="submitoDS.php" method="post" enctype="multipart/form-data">
        <label for "frst_name">First Name:</label><br>
        <input type="text" id="frst_name" name="frst_name" required><br><br>

        <label for="mid_name">Middle Name:</label><br>
        <input type="text" id="mid_name" name="mid_name" required><br><br>

        <label for="company_name">Last Name:</label><br>
        <input type="text" id="lst_name" name="lst_name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="contact">Contact:</label><br>
        <input type="tel" id="contact" name="contact" required><br><br>

        <label for="request_to_hire">What are you applying for?:</label><br>
        <select id="request_to_hire" name="request_to_hire" required>
            <option value="">Select an option</option>
            <option value="janitor">Employee</option>
            <option value="messenger">Client</option>
        </select><br><br>

        <label for="file_submission">File Submission:</label><br>
        <input type="file" id="file_submission" name="file_submission" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>