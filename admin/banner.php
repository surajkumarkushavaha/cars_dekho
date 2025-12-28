<?php include '../config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Banner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

   
    <div class="mb-4">
        <h2 class="fw-bold">Admin Panel – Manage Banner</h2>
        <p class="text-muted">Upload homepage banner image</p>
    </div>

    
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            Upload Banner
        </div>
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Banner Image</label>
                    <input type="file" name="img" class="form-control" required>
                </div>

                <button name="save" class="btn btn-primary">
                    Upload Banner
                </button>

            </form>

        </div>
    </div>

</div>

<?php

if(isset($_POST['save'])){
    $i = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], "../uploads/banners/".$i);
    mysqli_query($conn,"INSERT INTO banners(image) VALUES('$i')");
}
?>

</body>
</html>
