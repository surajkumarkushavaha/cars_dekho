<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Admin Panel</h2>
        <p class="text-muted">Manage website content</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Header</h5>
                    <p class="card-text text-muted">
                        Update website header title
                    </p>
                    <a href="header.php" class="btn btn-dark">
                        Manage Header
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Banner</h5>
                    <p class="card-text text-muted">
                        Upload homepage banner image
                    </p>
                    <a href="banner.php" class="btn btn-dark">
                        Manage Banner
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm text-center h-100">
                <div class="card-body">
                    <h5 class="card-title">Cars</h5>
                    <p class="card-text text-muted">
                        Add, view, Update and delete cars
                    </p>
                    <a href="cars.php" class="btn btn-dark">
                        Manage Cars
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
