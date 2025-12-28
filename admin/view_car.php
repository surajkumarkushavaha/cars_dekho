<?php
include '../config.php';

$id = $_GET['id'] ?? null;

if(!$id){
    header("Location: cars.php");
    exit;
}

$q = mysqli_query($conn, "SELECT * FROM cars WHERE id='$id'");
$car = mysqli_fetch_assoc($q);

if(!$car){
    echo "Car not found";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Car Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <h2 class="fw-bold mb-4">Car Details</h2>

    <div class="card shadow-sm p-4">

        <h4><?= htmlspecialchars($car['name']); ?></h4>
        <p><strong>Section:</strong> <?= ucfirst($car['section']); ?></p>

        <div class="mb-3">
            <img src="../uploads/cars/<?= $car['image']; ?>" class="img-fluid rounded" style="max-width: 300px;">
        </div>

        <a href="cars.php" class="btn btn-secondary">Back to Car List</a>

    </div>

</div>

</body>
</html>
