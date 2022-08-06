
<?php 
session_start();
include('connection.php');

    $email = $_SESSION['email'];
    $result = mysqli_query($con,"SELECT * FROM cart WHERE cName = '$email'");
    $row_count = mysqli_num_rows($result);
?>

<?php

if(!isset($_SESSION['email'])){
    header("Location:index.php");
}
else{
    $email = $_SESSION['email'];
    $sql = "select * from createaccount where email = '$email'";
    $result = mysqli_query($con,$sql) or
    die ("Record not found");
   
    $row = mysqli_fetch_row($result);
    if (isset($row)){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a5fdfa1bd7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="contact.css">
    <script src="contact.js"></script>
    <title>Contact Us</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
    .cart{
        background-color: goldenrod;
        margin-left: 92%;
        border: 0;
    }
    </style>
</head>
<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="dashboard" href="#">Dashboard</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <a class="cart" href="cart.php">
                <button class="btn">
                    <i class="fas fa-cart-plus"></i>
                    <div class="badge bg-danger"><?php echo $row_count; ?></div>
                </button>
            </a>
            </div>
        </div>
    </nav>     


<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light nav2">
    <div class="container-fluid">
        <i class="fas fa-shipping-fast"></i> &nbsp;&nbsp; <strong>E-commerce</strong>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="shopping.php">Home</a>
                 </li>
                <li class="nav-item">
                   <a class="nav-link act" href="#">Contact Us</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    All products
                    </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Shoes</a></li>
                    <li><a class="dropdown-item" href="#">T-shirt</a></li>
                    <li><a class="dropdown-item" href="#">Coat</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
    </nav>
    <div class="profile">
        <img src="images/profile.png" alt="">
        <p><?php echo $row['1'] ?></p>
    </div>
</div>

<?php
   }}
    ?>

<div class="container">

    <form action="https://formsubmit.co/8f0090ccb0392205fbc9d948bf250d69" method="POST">

    <div class="email_messagge">
        <label><i class="fa fa-user"></i></label>
        <input type="text" id="email" name="From" class="email" placeholder="your name" required>
    </div>

    <div class="email_messagge">
        <label><i class="fa fa-envelope"></i></label>
        <input type="email" id="email" name="Email" class="email" placeholder="your email" required>
    </div>

    <div class="email_messagge">
        <label><h6>To</h6></label>
        <input type="text" id="email" name="To" class="email" value="E-commerce" readonly required>
    </div>

    <div class="email_messagge">
        <label><i class="fa fa-comment"></i></label>
        <textarea type="text" id="message" name="Message" class="message" cols="30" rows="4" placeholder="Message" required></textarea>
    </div>

    <div class="submit">
        <button onclick="sendEmail()" class="btnSubmit">Send</button>
    </div>

    </form>

</div>

        

</body>
</html>