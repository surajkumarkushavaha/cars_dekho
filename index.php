<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>CarsDekho</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php $h=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM header")); ?>
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand fw-bold"><?= $h['title']; ?></span>
    </div>
</nav>
<div class="container mt-4">
<?php
$b=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM banners ORDER BY id DESC LIMIT 1"));
if($b){
?>
    <img src="uploads/banners/<?= $b['image']; ?>" class="img-fluid w-100 rounded shadow-sm">
<?php } ?>
</div>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            Choose Your Car Type
        </div>
        <div class="card-body">
            <form method="POST" action="submit_form.php" class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input class="form-control" name="name" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone Number</label>
                    <input class="form-control" name="phone" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email ID</label>
                    <input class="form-control" name="email" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Address</label>
                    <textarea class="form-control" name="address"></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Car Options</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="cars[]" value="Hatchback">
                        <label class="form-check-label">Hatchback</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="cars[]" value="Sedan">
                        <label class="form-check-label">Sedan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="cars[]" value="SUV">
                        <label class="form-check-label">SUV</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container mt-5">
    <h3 class="fw-bold mb-4">Most Searched Cars</h3>
    <div class="row g-4">
        <?php
        $q=mysqli_query($conn,"SELECT * FROM cars WHERE section='most'");
        while($c=mysqli_fetch_assoc($q)){
        ?>
        <div class="col-md-3 col-sm-6">
            <div class="card h-100 shadow-sm text-center">
                <img src="uploads/cars/<?= $c['image']; ?>" class="card-img-top">
                <div class="card-body">
                    <h6 class="card-title"><?= $c['name']; ?></h6>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<div class="container mt-5">
    <h3 class="fw-bold mb-4">Latest Cars</h3>
    <div class="row g-4">
        <?php
        $q=mysqli_query($conn,"SELECT * FROM cars WHERE section='latest'");
        while($c=mysqli_fetch_assoc($q)){
        ?>
        <div class="col-md-3 col-sm-6">
            <div class="card h-100 shadow-sm text-center">
                <img src="uploads/cars/<?= $c['image']; ?>" class="card-img-top">
                <div class="card-body">
                    <h6 class="card-title"><?= $c['name']; ?></h6>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<footer class="bg-dark text-white text-center p-3 mt-5">
    © CarsDekho Developed By Suraj Kumar Kushavaha
</footer>
</body>
</html>
