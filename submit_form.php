<?php
include 'config.php';
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$address=$_POST['address'];
$cars=implode(",",$_POST['cars']);
mysqli_query($conn,"INSERT INTO customers(name,phone,email,address,cars)
VALUES('$name','$phone','$email','$address','$cars')");
header("Location:index.php");
?>