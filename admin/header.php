<?php include '../config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Header</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="mb-4">
        <h2 class="fw-bold">Admin Panel – Manage Header</h2>
        <p class="text-muted">Update website header title</p>
    </div>
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            Update Header Title
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Header Title</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           placeholder="Enter header title"
                           required>
                </div>
                <button name="save" class="btn btn-primary">
                    Save Changes
                </button>
            </form>
        </div>
    </div>
</div>
<?php
if(isset($_POST['save'])){
    mysqli_query(
        $conn,
        "UPDATE header SET title='".$_POST['title']."'"
    );
}
?>
</body>
</html>
