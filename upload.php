<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "upload";
$port = 3306;

if (isset($_POST['upload'])) {
    // File upload path
    $photo = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"]; // Ensure this is correct
    $folder = "./images/" . basename($photo);

    // Move the uploaded file to the folder
    if (move_uploaded_file($tempname, $folder)) {
        echo "Image uploaded successfully.<br>";
    } else {
        echo "Image upload failed.<br>";
        exit();
    }

    // Sanitize user input
    $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
    $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
    $link = isset($_POST['link']) ? htmlspecialchars($_POST['link']) : '';

    // Create database connection
    $conn = new mysqli($host, $username, $password, $db, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO program (photo, title, description, link) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssss", $photo, $title, $description, $link);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "New record created successfully.<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Form</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        Photo: <input type="file" name="photo" required><br><br>
        Title: <input type="text" name="title" required><br><br>
        description: <textarea name="description" rows="5" cols="40" required></textarea><br><br>
        link: <input type="url" name="link" required><br><br>
        <input type="submit" name="upload" value="Upload">
    </form>
</body>
</html>