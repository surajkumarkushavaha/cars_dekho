<?php include '../config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Cars</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="mb-4">
        <h2 class="fw-bold">Admin Panel – Manage Cars</h2>
        <p class="text-muted">Add, view, Update and delete cars</p>
    </div>
    <div class="card shadow-sm mb-5">
        <div class="card-header bg-dark text-white">
            Add New Car
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Car Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter car name" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Section</label>
                    <select name="section" class="form-select">
                        <option value="most">Most Searched</option>
                        <option value="latest">Latest</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Car Image</label>
                    <input type="file" name="img" class="form-control" required>
                </div>
                <div class="col-12">
                    <button name="save" class="btn btn-primary">
                        Save Car
                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php
    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $section = $_POST['section'];
        $img = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], "../uploads/cars/".$img);
        mysqli_query(
            $conn,
            "INSERT INTO cars(name,image,section) VALUES('$name','$img','$section')"
        );
    }
    ?>
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            Car List
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Car Name</th>
                        <th>Section</th>
                        <th>Image</th>
                        <th width="200">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $q = mysqli_query($conn, "SELECT * FROM cars");
                $i = 1;
                if(mysqli_num_rows($q) == 0){
                    echo "<tr>
                            <td colspan='5' class='text-center text-muted'>
                                No cars added yet
                            </td>
                          </tr>";
                }
                while($c = mysqli_fetch_assoc($q)){
                ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $c['name']; ?></td>
                        <td><?= ucfirst($c['section']); ?></td>
                        <td>
                            <img src="../uploads/cars/<?= $c['image']; ?>" 
                                 class="img-thumbnail"
                                 width="80">
                        </td>
                        <!-- <td>
                            <a href="delete.php?id=<?php //$c['id']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this car?')">
                               Delete
                            </a>
                        </td> -->
                        <td>
                        <a href="view_car.php?id=<?= $c['id']; ?>" 
                        class="btn btn-info btn-sm me-1">
                        View
                        </a>
                        <a href="edit_car.php?id=<?= $c['id']; ?>"
                        class="btn btn-warning btn-sm me-1">
                        Edit
                        </a>
                        <a href="delete.php?id=<?= $c['id']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this car?')">
                        Delete
                        </a>
                    </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
