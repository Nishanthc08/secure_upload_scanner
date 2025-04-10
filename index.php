<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Upload Portal</title>
</head>
<body>
    <h2>Upload a file</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required><br><br>
        <button type="submit">upload</button>
    </form>
    <br>
    <a href="list.php">View Uploaded Files</a>
</body>
</html>