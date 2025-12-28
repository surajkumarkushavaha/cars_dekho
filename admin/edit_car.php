<?php
include '../config.php';
$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * FROM cars WHERE id='$id'");
$car = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Car</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="fw-bold mb-4">Edit Car</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Car Name</label>
                    <input type="text" name="name"
                           value="<?= $car['name']; ?>"
                           class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Section</label>
                    <select name="section" class="form-select">
                        <option value="most" <?= $car['section']=='most'?'selected':''; ?>>Most Searched</option>
                        <option value="latest" <?= $car['section']=='latest'?'selected':''; ?>>Latest</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Change Image (optional)</label>
                    <input type="file" name="img" class="form-control">
                </div>
                <button name="update" class="btn btn-primary">
                    Update Car
                </button>
                <a href="cars.php" class="btn btn-secondary">
                    Back
                </a>
            </form>
        </div>
    </div>
</div>
<?php
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $section = $_POST['section'];
    if(!empty($_FILES['img']['name'])){
        $img = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], "../uploads/cars/".$img);
        mysqli_query($conn,
            "UPDATE cars SET name='$name', section='$section', image='$img' WHERE id='$id'"
        );
    } else {
        mysqli_query($conn,
            "UPDATE cars SET name='$name', section='$section' WHERE id='$id'"
        );
    }
    header("Location: cars.php");
}
?>
</body>
</html>
