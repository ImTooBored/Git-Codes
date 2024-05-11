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
        <label for="company_name">Company Name:</label><br>
        <input type="text" id="company_name" name="company_name" required><br><br>

        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="contact">Contact:</label><br>
        <input type="tel" id="contact" name="contact" required><br><br>

        <label for="request_to_hire">Position:</label><br>
        <select id="request_to_hire" name="request_to_hire" required>
            <option value="">Select an option</option>
            <option value="janitor">Janitor</option>
            <option value="messenger">Messenger</option>
        </select><br><br>

        <label for="num_personnel">Number of Personnel to Hire:</label><br>
        <input type="number" id="num_personnel" name="num_personnel" min="1" required><br><br>

        <label for="file_submission">File Submission:</label><br>
        <input type="file" id="file_submission" name="file_submission" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>