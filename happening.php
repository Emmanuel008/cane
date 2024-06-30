<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "upload";
$port = 3306;


if (isset($_POST['upload']) || isset($_POST['update'])) {
    
    $photo = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"];
    $folder = "./images/" . basename($photo);

    
    if (move_uploaded_file($tempname, $folder)) {
        echo "<script>alert('Image uploaded successfully.');</script>";
    } else {
        echo "<script>alert('Image upload failed.');</script>";
        exit();
    }

    
    $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
    $content = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
    $readmore = isset($_POST['link']) ? htmlspecialchars($_POST['link']) : '';

   
    $conn = new mysqli($host, $username, $password, $db, $port);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];

       
        $stmt = $conn->prepare("UPDATE happen SET photo = ?, title = ?, description = ?, link = ? WHERE id = ?");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

      
        $stmt->bind_param("ssssi", $photo, $title, $content, $readmore, $id);

      
        if ($stmt->execute()) {
            echo "<script>alert('Record updated successfully.');</script>";
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }

       
        $stmt->close();
    } else {
      
        $stmt = $conn->prepare("INSERT INTO happen (photo, title, description, link) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        
        $stmt->bind_param("ssss", $photo, $title, $content, $readmore);

        
        if ($stmt->execute()) {
            echo "<script>alert('New record created successfully.');</script>";
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }

        
        $stmt->close();
    }

    
    $conn->close();
}


if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    
    $conn = new mysqli($host, $username, $password, $db, $port);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $stmt = $conn->prepare("DELETE FROM happen WHERE id = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    
    $stmt->bind_param("i", $id);

    
    if ($stmt->execute()) {
        echo "<script>alert('Record deleted successfully.');</script>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    
    $stmt->close();
    $conn->close();
}


$conn = new mysqli($host, $username, $password, $db, $port);
$result = $conn->query("SELECT * FROM happen");
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
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <img alt="Homepage" src="images/buni logo.png" style="height: 50px;width: 70px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="upload.php">Programs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="happening.php">What's Happening</a>
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
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="content">Description:</label>
                        <textarea name="description" rows="5" class="form-control" required></textarea>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="readmore">Link:</label>
                        <input type="url" class="form-control" id="link" placeholder="Enter Read More" name="link" required>
                        <div class="valid-feedback">Valid.</div>
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
            <div class="table-container">
                <div class="table-responsive">
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
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
   
    function editRecord(id, title, description, link) {
        $('input[name="id"]').val(id);
        $('input[name="title"]').val(title);
        $('textarea[name="description"]').val(description);
        $('input[name="link"]').val(link);
        $('button[name="upload"]').hide();
        $('button[name="update"]').show();
    }

    
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var form = document.getElementById('uploadForm');
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        }, false);
    })();
</script>
</body>
</html>

