
<?php 
session_start();
include('connection.php');

    $product_no = $_SESSION['product_no'];
    $result = mysqli_query($con,"SELECT * FROM addaproduct WHERE no = '$product_no'");
    while($row = mysqli_fetch_array($result)) {

    $update_no = $row['no'];
    $update_image = $row['image'];
    $update_title = $row['title'];
    $update_description = $row['description'];
    $update_price = $row['price'];

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
    <title>Edit</title>

    <style>
        .editBox{
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  align-items: center;
  justify-content:center;
  background: rgba(77, 77, 77, 0.7);
  transition: all 0.4s;
  visibility: visible;
  opacity: 1;
}

.editContent{
  position: relative;
  background: #fff;
  width: 500px;
  max-width: 90%;
  padding: 1em 2em;
  border-radius: 4px;
}

.editContent .product{
  text-align: center;
}

.editContent img{
  width: 25%;
  height: 25%;
}

.editContent input{
  margin-top: 0;
}

.editContent textarea{
  width: 100%;
}

.fa-close{
    color: black;
  position: absolute;
  left: 97%;
  top: 2%;
}

.fa-close:hover{
  cursor: pointer;
  color: darkred;
}
    </style>

<script>

</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

<div id="editBox" class="editBox">
        <div class="editContent">
        <form action="" method="post">
        <div class="product">
            <h3>Update Product</h3>
            <img src="<?php echo"product_image/".$update_image ?>" alt="">
            <h5><strong>#</strong><?php echo $update_no ?></h5>
            <input name="new_no" type="hidden" value="<?php echo $update_no ?>">
        </div>
                <h6>Product Name:</h6>
                <input name="new_name" type="text" value="<?php echo $update_title ?>">
                <h6>Product Price: <strong>$</strong></h6>
                <input name="new_price" type="text" value="<?php echo $update_price ?>">
                <h6>Description:</h6>
                <textarea name="new_descrition"rows="5"><?php echo $update_description ?></textarea>
            <div>
                <button name="update_product" class="btn btn-primary">Update</button>
            </div>
           <a href="dashboard.php"><i class="fa fa-close"></i></a>
           </form>
        </div>
    </div>

    <?php
    
    if(isset($_POST['update_product'])){

      $product_no = $_SESSION['product_no'];
      $new_name = $_POST['new_name'];
      $new_price = $_POST['new_price'];
      $new_descrition = $_POST['new_descrition'];

      $update_product_query = mysqli_query($con, "UPDATE addaproduct SET title = '$new_name', price = '$new_price', description = '$new_descrition' WHERE no = '$product_no'");
      header("Location: dashboard.php");

    }
    
    ?>
    
</body>
</html>