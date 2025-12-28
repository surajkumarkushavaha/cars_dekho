<?php include '../config.php'; 
mysqli_query($conn,"DELETE FROM cars WHERE id=".$_GET['id']); 
header('Location:cars.php'); ?>