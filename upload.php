<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "upload";
$port = 3306;


$conn = new mysqli($host, $username, $password, $db, $port);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['upload']) || isset($_POST['update'])) {
   
    $photo = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"]; 
    $folder = "./images/" . basename($photo);

    if (move_uploaded_file($tempname, $folder)) {
        echo "<div class=\"alert alert-success\">
  <strong>Success!</strong> image uploaded successfuly.
</div>";
    } else {
       echo "<div class=\"alert alert-danger\">
  <strong>Success!</strong> image upload failed.
</div>";
        exit();
    }

   
    $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
    $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
    $link = isset($_POST['link']) ? htmlspecialchars($_POST['link']) : '';

    if (isset($_POST['update'])) {
        $id = $_POST['id'];

        
        $stmt = $conn->prepare("UPDATE program SET photo = ?, title = ?, description = ?, link = ? WHERE id = ?");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        
        $stmt->bind_param("ssssi", $photo, $title, $description, $link, $id);

        
        if ($stmt->execute()) {
            echo "<div class=\"alert alert-success\">
  <strong>Success!</strong> Record updated successfully.
</div>";
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }

       
        $stmt->close();
    } else {
        
        $stmt = $conn->prepare("INSERT INTO program (photo, title, description, link) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        
        $stmt->bind_param("ssss", $photo, $title, $description, $link);

        
        if ($stmt->execute()) {
            echo "<div class=\"alert alert-success\">
  <strong>Success!</strong> New record created succesfully.
</div>";
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }

        
        $stmt->close();
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

   
    $stmt = $conn->prepare("DELETE FROM program WHERE id = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    
    $stmt->bind_param("i", $id);

   
    if ($stmt->execute()) {
        echo "<div class=\"alert alert-success\">
  <strong>Success!</strong> Record deleted successfully.
</div>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    
    $stmt->close();
}

$result = $conn->query("SELECT * FROM program");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 500px;
            background-color: white;
        }
        .table-container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="form-container">
                
                <img alt="Homepage" src="images/buni logo.png" style="max-width: 100%; margin-bottom: 20px;">

                <form id="uploadForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" novalidate>
                    <input type="hidden" name="id" value="">
                    <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" name="photo" class="form-control" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please select a photo.</div>
                    </div>
                    <div class="form-group">
                        <label for="title">Title:</label></br>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" required></br>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label></br>
                        <textarea name="description" rows="5" class="form-control" required></textarea></br>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="link">Link:</label></br>
                        <input type="url" class="form-control" id="link" placeholder="Enter Read More" name="link" required></br>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" name="upload" value="Upload">Submit</button>
                        <button type="submit" class="btn btn-warning" name="update" value="Update">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-7">
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
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><img src="images/<?php echo $row['photo']; ?>" alt="<?php echo $row['title']; ?>" width="50"></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['link']; ?></a></td>
                            <td>
                                <form method="post" style="display:inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                <form method="post" enctype="multipart/form-data" style="display:inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="edit" class="btn btn-warning btn-sm">Edit</button>
                                </form>
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
$(document).ready(function() {
    $('button[name="edit"]').click(function(e) {
        e.preventDefault();
        var row = $(this).closest('tr');
        var id = row.find('input[name="id"]').val();
        var photo = row.find('img').attr('src').replace('images/', '');
        var title = row.find('td:eq(1)').text();
        var description = row.find('td:eq(2)').text();
        var link = row.find('a').attr('href');

        $('input[name="id"]').val(id);
        $('input[name="title"]').val(title);
        $('textarea[name="description"]').val(description);
        $('input[name="link"]').val(link);
        $('input[name="photo"]').val(photo);
    });
});
</script>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
