<?php

session_start();
include('connection.php');

if(isset($_POST['dash_btn'])){

    $password = $_POST['dash_password'];
    $sql = "select * from dashboard where password = '$password'";
    $result = mysqli_query($con,$sql) or
    die ("Record not found");
   
    $row = mysqli_fetch_row($result);
    if (isset($row)){
        $_SESSION['password'] = $password;
    header("Location:dashboard.php");
   }
}

?>

<?php 

    $email = $_SESSION['email'];
    $result = mysqli_query($con,"SELECT * FROM cart WHERE cName = '$email'");
    $row_count = mysqli_num_rows($result);
?>

<?php

include('connection.php');

if(isset($_SESSION['alreadyAdded_alert'])){
    $alreadyAdded='Product already added to your cart!';
}

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

<?php
    if(isset($_POST['review'])){
    $_SESSION['p_no'] = $_POST['pNo'];
    $_SESSION['USER'] = $_POST['USER'];
    header("Location: review.php");
    }
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
    <link rel="stylesheet" href="shoppong.css">
    <script src="shopping.js"></script>
    <title>Shopping</title>
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="dashboard" onclick="openDashboard()">Dashboard</a>
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
                        <a class="nav-link act" aria-current="page" href="#">Home</a>
                     </li>
                    <li class="nav-item">
                       <a class="nav-link" href="contact.php">Contact Us</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Telephone
                        </a>
                      <ul name="cat" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="shopping.php">All products</a></li>
                      <li><a class="dropdown-item" href="laptop.php">Laptop</a></li>
                      <li><a class="dropdown-item" href="accessories.php">Accessories</a></li>
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
            <p><?php echo $username = $row['1'] ?></p>
        </div>
    </div>

    <div class="container">
        <div class="row">
        <?php
        $result = mysqli_query($con,"SELECT * FROM addaproduct WHERE categories='telephone'");
        while($row = mysqli_fetch_array($result)) {
        ?>
            <div class="card col-md-3">
            <form action="" method="post">
                <img src="<?php echo"product_image/".$row['image'] ?>" alt="">
                <strong class="itemdata">#<span><?php echo $row['no'] ?></span></strong>
                <h5 class="itemdata"><?php echo $row['title'] ?></h5>
                <p class="itemdata"><?php echo $row['description'] ?></p>
                <p>Price:<strong >$<?php echo $row['price'] ?></strong></p>

                <input type="hidden" name="cName" value="<?php echo $email ?>">
                <input type="hidden" name="USER" value="<?php echo $username ?>">
                <input type="hidden" name="pNo" value="<?php echo $row['no'] ?>">
                <input type="hidden" name="pTitle" value="<?php echo $row['title'] ?>">
                <input type="hidden" name="pDescription" value="<?php echo $row['description'] ?>">
                <input type="hidden" name="pPrice" value="<?php echo $row['price'] ?>">
                <input type="hidden" name="pQty" value="1">

               <div>
               <button class="btn btn-primary" name="addToCart">Add to Cart<i class="fas fa-cart-plus"></i></button>
               </div>
               
               <div>
               <button name="review" class="btn btn-primary review">Reviews<i class="fas fa-comment"></i></button>
               </div>
            </div>
            </form>
            <?php }}} ?>
        </div>
    </div>

    <div id="dashboardBox" class="dashboardBox">
        <form action="" method="post">
        <div class="dashboardContent">
            <h3>Dashboard</h3>
            <input name="dash_password" type="password">
            <div>
                <button name="dash_btn" class="btn btn-primary">Submit</button>
            </div>
            <i onclick="closeDashboard()" class="fa fa-close"></i>
        </div>
        </form>
    </div>

    <?php

include 'connection.php';

if(isset($_POST['addToCart'])){

    $cName=$_POST['cName'];
    $pNo=$_POST['pNo'];
    $pTitle=$_POST['pTitle'];
    $pDescription=$_POST['pDescription'];
    $pPrice=$_POST['pPrice'];
    $pQty=$_POST['pQty'];

    $sql1="SELECT * FROM cart where pNo='$pNo' && cName = '$cName'";
    $result=mysqli_query($con,$sql1);
    $present=mysqli_fetch_row($result);
    if($present>0){?>
    <script>
        swal("Error!", "This product already added to cart", "error");
    </script>
    <?php
}else{
    $sql="INSERT INTO cart (cName, pNo, pTitle, pDescription, pPrice, pQty) VALUES('$cName', '$pNo', '$pTitle', '$pDescription', '$pPrice', '$pQty')";
    $results=mysqli_query($con,$sql);
    ?>
    <script>
        swal("Success!", "Product added to cart", "success");
    </script>
    <?php
}
}

?>

</body>
</html>