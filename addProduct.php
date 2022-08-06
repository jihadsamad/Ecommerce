<?php

session_start();

include('connection.php');

$image=$_FILES['image']['name'];
$no=$_POST['no'];
$title=$_POST['title'];
$categories=$_POST['categories'];
$price=$_POST['price'];
$description=$_POST['description'];

$sql1="SELECT * FROM addaproduct where no='$no'";
$result=mysqli_query($con,$sql1);
$present=mysqli_fetch_row($result);
if($present>0){
    $_SESSION['no_alert']='1';
    header("Location:dashboard.php");
}
else{
$sql="INSERT INTO addaproduct (image, no, title, categories, price, description) VALUES('$image', '$no', '$title', '$categories', '$price', '$description')";
$results=mysqli_query($con,$sql);
move_uploaded_file($_FILES['image']['tmp_name'], "product_image/".$_FILES['image']['name']);

header("Location:dashboard.php");
}

?>