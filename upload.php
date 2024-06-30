<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "upload";
$port = 3306;

// Establish database connection
$conn = new mysqli($host, $username, $password, $db, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Upload, Update, and Delete actions
if (isset($_POST['upload']) || isset($_POST['update'])) {
    // File upload path
    $photo = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"];
    $folder = "./images/" . basename($photo);

    // Move uploaded file to folder
    if (move_uploaded_file($tempname, $folder)) {
        echo '<div class="alert alert-success" role="alert">Image uploaded successfully.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Image upload failed.</div>';
        exit();
    }

    // Sanitize user input
    $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
    $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
    $link = isset($_POST['link']) ? htmlspecialchars($_POST['link']) : '';

    if (isset($_POST['update'])) {
        $id = $_POST['id'];

        // Prepare SQL statement for update
        $stmt = $conn->prepare("UPDATE program SET photo = ?, title = ?, description = ?, link = ? WHERE id = ?");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("ssssi", $photo, $title, $description, $link, $id);

        // Execute SQL statement
        if ($stmt->execute()) {
            echo '<div class="alert alert-success" role="alert">Record updated successfully.</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error updating record: ' . $stmt->error . '</div>';
        }

        // Close statement
        $stmt->close();
    } else {
        // Prepare SQL statement for insertion
        $stmt = $conn->prepare("INSERT INTO program (photo, title, description, link) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("ssss", $photo, $title, $description, $link);

        // Execute SQL statement
        if ($stmt->execute()) {
            echo '<div class="alert alert-success" role="alert">New record created successfully.</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error creating record: ' . $stmt->error . '</div>';
        }

        // Close statement
        $stmt->close();
    }
}

// Handle Delete
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Prepare SQL statement for deletion
    $stmt = $conn->prepare("DELETE FROM program WHERE id = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Record deleted successfully.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error deleting record: ' . $stmt->error . '</div>';
    }

    // Close statement
    $stmt->close();
}

// Fetch records from the database
$result = $conn->query("SELECT * FROM program");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Program Records Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            background-color: white;
            margin-top: 50px;
        }
        .form-container img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100px;
        }
        .table-container {
            margin-top: 20px;
            max-width: 100%;
            overflow-x: auto;
        }
    </style>
</head>
<body>
<header class="s-header">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <img alt="Homepage" src="images/buni logo.png" style="height: 50px;width: 70px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="upload.php">Programs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="happening.php">What's Happening</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="program.php">Blog</a>
        </li>
      </ul>
    </div>
  </div>
</nav> 
    </header>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <div class="form-container">
                <img alt="Logo" src="images/buni logo.png" style="max-width: 100px; margin-bottom: 20px;">
                <form id="uploadForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" novalidate>
                    <input type="hidden" name="id" value="">
                    <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" name="photo" class="form-control-file" required>
                        <div class="invalid-feedback">Please select a photo.</div>
                    </div>
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" required>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" rows="5" class="form-control" required></textarea>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="link">Link:</label>
                        <input type="url" class="form-control" id="link" placeholder="Enter Link" name="link" required>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" name="upload">Submit</button>
                        <button type="submit" class="btn btn-warning ml-2" name="update" style="display:none;">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-7">
            <br>
            <h2><strong>PROGRAM RECORDS</strong></h2>
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><img src="images/<?php echo $row['photo']; ?>" alt="<?php echo $row['title']; ?>" width="50"></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['link']; ?></a></td>
                                <td>
                                    <form method="post" style="display: inline-block;">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    <button type="button" class="btn btn-warning btn-sm" onclick="editRecord(<?php echo $row['id']; ?>, '<?php echo $row['title']; ?>', '<?php echo $row['description']; ?>', '<?php echo $row['link']; ?>')">Edit</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Function to set form fields for editing
    function editRecord(id, title, description, link) {
        $('input[name="id"]').val(id);
        $('input[name="title"]').val(title);
        $('textarea[name="description"]').val(description);
        $('input[name="link"]').val(link);
        $('button[name="upload"]').hide();
        $('button[name="update"]').show();
    }
</script>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
