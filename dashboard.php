<?php

include('connection.php');

session_start();

if(!isset($_SESSION['password'])){
    header("Location:shopping.php");
}

?>

<?php

$message='';
if(isset($_SESSION['no_alert'])){
    $message='sr.no already exist';
}

?>

<?php

if(isset($_POST['accept'])){

    include('connection.php');

    $id=$_POST['id'];

    $sql1 = mysqli_query($con,"SELECT * FROM chekout WHERE id = $id");
   
    $row = mysqli_fetch_row($sql1);
    if (isset($row)){

    $accept_name = $row['1'];
    $accept_email = $row['2'];
    $accept_phone = $row['3'];
    $accept_district = $row['4'];
    $accept_street = $row['5'];
    $accept_building = $row['6'];
    $accept_no = $row['7'];
    $accept_product = $row['8'];
    $accept_price = $row['9'];
};


$sql2="INSERT INTO accepted (accept_name,
                           accept_email,
                           accept_phone,
                           accept_district,
                           accept_street,
                           accept_building,
                           accept_no,
                           accept_product,
                           accept_price)
                VALUES('$accept_name',
                        '$accept_email',
                        '$accept_phone',
                        '$accept_district',
                        '$accept_street',
                        '$accept_building',
                        '$accept_no',
                        '$accept_product',
                        '$accept_price')";
$result1=mysqli_query($con,$sql2);

$sql3 = mysqli_query($con,"DELETE FROM chekout WHERE id = $id");

}

?>

<?php

if(isset($_POST['deliver'])){

    include('connection.php');

    $deliver_id=$_POST['deliver_id'];

    $sql1 = mysqli_query($con,"SELECT * FROM accepted WHERE id = $deliver_id");
   
    $row = mysqli_fetch_row($sql1);
    if (isset($row)){

    $deliver_name = $row['1'];
    $deliver_email = $row['2'];
    $deliver_phone = $row['3'];
    $deliver_district = $row['4'];
    $deliver_street = $row['5'];
    $deliver_building = $row['6'];
    $deliver_no = $row['7'];
    $deliver_product = $row['8'];
    $deliver_price = $row['9'];
};


$sql2="INSERT INTO delivered (deliver_name,
                           deliver_email,
                           deliver_phone,
                           deliver_district,
                           deliver_street,
                           deliver_building,
                           deliver_no,
                           deliver_product,
                           deliver_price)
                VALUES('$deliver_name',
                        '$deliver_email',
                        '$deliver_phone',
                        '$deliver_district',
                        '$deliver_street',
                        '$deliver_building',
                        '$deliver_no',
                        '$deliver_product',
                        '$deliver_price')";
$result1=mysqli_query($con,$sql2);

$sql3 = mysqli_query($con,"DELETE FROM accepted WHERE id = $deliver_id");

}

?>

<?php

if(isset($_POST['reject'])){
    $id=$_POST['id'];
    $delete_order = mysqli_query($con,"DELETE FROM chekout WHERE id = $id");
}

?>

<?php

if(isset($_POST['delete_customer'])){
    $id=$_POST['UID'];
    $delete_customer = mysqli_query($con,"DELETE FROM createaccount WHERE id = $id");
}

?>

<?php

if(isset($_GET['remove'])){
    $remove_no = $_GET['remove'];
    $response = mysqli_query($con, "DELETE FROM addaproduct WHERE no = $remove_no");
    if($response){?>
    <script>
        swal("Success!", "Product deleted", "success");
    </script>
    <?php
    }
};

?>

<?php

if(isset($_POST['edit'])){
    $_SESSION['product_no'] = $_POST['product_no'];
    header("Location: edit.php");
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
    <link rel="stylesheet" href="dashboard.css">
    <script src="dashboard.js"></script>
    <title>Dashboard</title>
    <style>
        .tab a {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    color: black;
    text-decoration: none;
  }
    </style>
</head>
<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'allProducts')" id="defaultOpen">All Products</button>
    <button class="tablinks" onclick="openCity(event, 'addProduct')">Add Products</button>
    <button class="tablinks" onclick="openCity(event, 'editProduct')">Edit Products</button>
    <button class="tablinks" onclick="openCity(event, 'Customers')">Customers</button>
    <button class="tablinks" onclick="openCity(event, 'newOrders')">New Orders</button>
    <button class="tablinks" onclick="openCity(event, 'acceptedOrders')">Accepted Orders</button>
    <button class="tablinks" onclick="openCity(event, 'deliveredOrders')">Delivered Orders</button>
    <button class="tablinks" onclick="openCity(event, 'changePassword')">Change Password</button>
    <a href="logout.php" class="tablinks">LogOut</a>
  </div>
  
  <div id="allProducts" class="tabcontent">

  <?php
include('connection.php');

$result = mysqli_query($con,"SELECT * FROM addaproduct");
?>

    <div class="container">
        <div class="card-product">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Sr.no</th>
                        <th>Product Name</th>
                        <th>Product Iamge</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td style="width: 10%;">#<?php echo $row['no'] ?></td>
                        <td style="width: 20%;"><?php echo $row['title'] ?></td>
                        <td style="width: 30%;"><img src="<?php echo"product_image/".$row['image'] ?>" style="width: 120px;"></td>
                        <td style="width: 30%;"><?php echo $row['description'] ?></td>
                        <td style="width: 20%;">$<?php echo $row['price'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
  
  <div id="addProduct" class="tabcontent">
    <div class="container">
        <form action="addProduct.php" method="post">
        <div class="wrapper">
            <div class="image">
                <img id="imagePreview">
            </div>
            <div class="content">
                <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                <div class="text">Upload Image</div>
            </div>
            <div id="cancel-btn"><i class="fas fa-times"></i></div>
            <div class="file-name">File name here</div>
        </div>
        <input id="default-btn" name="image" type="file"><br>
        <div class="inputs">
            <label>Product ID</label><br>
            <input name="no" style="width: 18%;" type="text"><br>
            <label>Product Name</label><br>
            <input name="title" style="width: 18%;" type="text"><br>
            <label>Categories</label><br>
            <select name="categories" id="">
                <option value="telephone">Telephone</option>
                <option value="laptop">Laptop</option>
                <option value="accessories">Accessories</option>
            </select>
            <br>
            <label>Product Price</label><br>
            <input name="price" style="width: 18%;" type="text"><br>
            <label>Description</label><br>
            <input name="description" style="width: 18%;" type="text"><br><br>
            <button>Add Product</button>
        </div>
        </form>

        <div class="error">
                <h6><?php echo $message; ?></h6>
            </div>

                <?php unset($_SESSION['no_alert']); ?>

    </div>
  </div>
  
  <div id="editProduct" class="tabcontent">

  <?php
include('connection.php');

$result = mysqli_query($con,"SELECT * FROM addaproduct");
?>

    <div class="container">
        <div class="card-product">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Sr.no</th>
                        <th>Product Name</th>
                        <th>Product Iamge</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while($row = mysqli_fetch_array($result)) {

                    $get_no = $row['no'];
                    $get_title = $row['title'];
                    $get_image = $row['image'];
                    $get_description = $row['description'];
                    $get_price = $row['price'];

                    ?>
                    <form action="" method="post">
                    <tr>
                        <td style="width: 10%;">#<?php echo $row['no'] ?>
                        <input type="hidden" name="product_no" value="<?php echo $get_no; ?>"></td>
                        <td style="width: 20%;"><?php echo $get_title ?></td>
                        <td style="width: 30%;"><img src="<?php echo"product_image/".$get_image ?>" style="width: 120px;"></td>
                        <td style="width: 30%;"><?php echo $get_description ?></td>
                        <td style="width: 20%;">$<?php echo $get_price ?></td>
                        <td style="width: 10%;"><button name="edit" class="btn btn-primary"><i class="fa fa-pen"></i></button></td>
                        <td style="width: 10%;"><a href="dashboard.php?remove=<?php echo $row['2'] ?>" onclick="return confirm('delete product?')" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

  </div>

  <div id="Customers" class="tabcontent">

  <?php
include('connection.php');

$result = mysqli_query($con,"SELECT * FROM createaccount");
?>

    <div class="container">
        <div class="card-product">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while($row = mysqli_fetch_array($result)) {
                    ?>
                    <form action="" method="post">
                    <tr>
                        <td style="width: 20%;"><?php echo $row['id'] ?>
                        <input type="hidden" name="UID" value="<?php echo $row['id'] ?>"></td>
                        <td style="width: 30%;"><?php echo $row['username'] ?></td>
                        <td style="width: 30%;"><?php echo $row['phone'] ?></td>
                        <td style="width: 40%;"><?php echo $row['email'] ?></td>
                        <td style="width: 10%;"><button name="delete_customer" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                    </tr>
                    </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>

  <div id="newOrders" class="tabcontent">

  <?php
include('connection.php');

$result = mysqli_query($con,"SELECT * FROM chekout");
?>

    <div class="container">
        <div class="card-product">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>C.Name</th>
                        <th>C.Email</th>
                        <th>C.Phone</th>
                        <th>C.District</th>
                        <th>C.Street</th>
                        <th>C.Building</th>
                        <th>Sr.no</th>
                        <th>Product&Quantity</th>
                        <th>Price</th>
                        <th>Accept</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while($row = mysqli_fetch_array($result)) {
                    ?>
                <form action="" method="post">
                    <tr>
                        <td style="width: 10%;"><?php echo $row['customer_name'] ?>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>"></td>
                        <td style="width: 15%;"><?php echo $row['customer_email'] ?></td>
                        <td style="width: 10%;"><?php echo $row['customer_phone'] ?></td>
                        <td style="width: 10%;"><?php echo $row['customer_district'] ?></td>
                        <td style="width: 10%;"><?php echo $row['customer_street'] ?></td>
                        <td style="width: 10%;"><?php echo $row['customer_building'] ?></td>
                        <td style="width: 10%;"><?php echo $row['all_products_no'] ?></td>
                        <td style="width: 10%;"><?php echo $row['all_products'] ?></td>
                        <td style="width: 15%;">$<?php echo $row['total_price'] ?></td>
                        <td style="width: 10%;"><button name="accept" class="btn btn-success"><i class="fa fa-check"></i></button></td>
                        <td style="width: 10%;"><button name="reject" class="btn btn-danger"><i class="fa fa-close"></i></i></button></td>
                    </tr>
                    </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>

  <div id="acceptedOrders" class="tabcontent">

  <?php
include('connection.php');

$result = mysqli_query($con,"SELECT * FROM accepted");
?>

    <div class="container">
        <div class="card-product">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>C.Name</th>
                        <th>C.Email</th>
                        <th>C.Phone</th>
                        <th>C.District</th>
                        <th>C.Street</th>
                        <th>C.Building</th>
                        <th>Sr.no</th>
                        <th>Product&Quantity</th>
                        <th>Price</th>
                        <th>Deliver</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while($row = mysqli_fetch_array($result)) {
                    ?>
                <form action="" method="post">
                    <tr>
                        <td style="width: 10%;"><?php echo $row['1'] ?>
                        <input type="hidden" name="deliver_id" value="<?php echo $row['id'] ?>"></td>
                        <td style="width: 15%;"><?php echo $row['2'] ?></td>
                        <td style="width: 10%;"><?php echo $row['3'] ?></td>
                        <td style="width: 10%;"><?php echo $row['4'] ?></td>
                        <td style="width: 10%;"><?php echo $row['5'] ?></td>
                        <td style="width: 10%;"><?php echo $row['6'] ?></td>
                        <td style="width: 10%;"><?php echo $row['7'] ?></td>
                        <td style="width: 10%;"><?php echo $row['8'] ?></td>
                        <td style="width: 15%;">$<?php echo $row['9'] ?></td>
                        <td style="width: 10%;"><button name="deliver" class="btn btn-success"><i class="fa fa-truck"></i></button></td>
                    </tr>
                    </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>

  <div id="deliveredOrders" class="tabcontent">

  <?php
include('connection.php');

$result = mysqli_query($con,"SELECT * FROM delivered");
?>

    <div class="container">
        <div class="card-product">
            <table class="table table-responsive">
                <thead>
                    <tr>
                    <th>C.Name</th>
                        <th>C.Email</th>
                        <th>C.Phone</th>
                        <th>C.District</th>
                        <th>C.Street</th>
                        <th>C.Building</th>
                        <th>Sr.no</th>
                        <th>Product&Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while($row = mysqli_fetch_array($result)) {
                    ?>
                <form action="" method="post">
                    <tr>
                    <td style="width: 10%;"><?php echo $row['1'] ?></td>
                        <td style="width: 15%;"><?php echo $row['2'] ?></td>
                        <td style="width: 10%;"><?php echo $row['3'] ?></td>
                        <td style="width: 10%;"><?php echo $row['4'] ?></td>
                        <td style="width: 10%;"><?php echo $row['5'] ?></td>
                        <td style="width: 10%;"><?php echo $row['6'] ?></td>
                        <td style="width: 10%;"><?php echo $row['7'] ?></td>
                        <td style="width: 10%;"><?php echo $row['8'] ?></td>
                        <td style="width: 15%;">$<?php echo $row['9'] ?></td>
                    </tr>
                    </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>

  <div id="changePassword" class="tabcontent">
  <div class="container">
        <form action="" method="post">
            <label>Current Password</label>
            <input name="c_password" type="password" required><br>
            <label>New Password</label> &nbsp;&nbsp;&nbsp;
            <input name="n_password" type="password" required><br>
            <label>Confirm Password</label>
            <input name="con_password" type="password" required><br><br>
            <button name="change_password">Change Password</button>
        </form>
    </div>
  </div>

  <?php
  
  if(isset($_POST['change_password'])){

    $c_password = $_POST['c_password'];
    $n_password = $_POST['n_password'];
    $con_password = $_POST['con_password'];

    $sql1="SELECT * FROM dashboard where password='$c_password'";
$result=mysqli_query($con,$sql1);
$present=mysqli_fetch_row($result);
if(!$present>0){?>
    <script>
        swal("Warning!", "Incorrect password!", "warning");
    </script>
    <?php
}
else if($con_password != $n_password){?>
    <script>
        swal("Error!", "Password mismatch!", "error");
    </script>
    <?php
}
else{
$sql2="UPDATE dashboard SET password = $n_password WHERE password = '$c_password'";
$results=mysqli_query($con,$sql2);
if($results){?>
    <script>
        swal("Success!", "Password changed!", "success");
    </script>
    <?php
}
}

  }
  
  ?>
    
</body>
</html>