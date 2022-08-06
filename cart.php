
<?php

include('connection.php');

session_start();

if(!isset($_SESSION['email'])){
    header("Location:index.php");
}

?>

<?php

if(isset($_POST['update_cart'])){
    $email = $_SESSION['email'];
    $update_value = $_POST['pruduct_qty'];
    $update_no = $_POST['pruduct_no'];
    $update_qty_query = mysqli_query($con, "UPDATE cart SET pQty = '$update_value' WHERE pNo = '$update_no' && cName = '$email'");
    if($update_qty_query){?>
    <script>
        swal("Success!", "Cart updated", "success");
    </script>
    <?php
    }
};

if(isset($_GET['remove'])){
    $email = $_SESSION['email'];
    $remove_no = $_GET['remove'];
    $response = mysqli_query($con, "DELETE FROM cart WHERE PnO = $remove_no && cName = '$email'");
    if($response){?>
    <script>
        swal("Success!", "Product deleted", "success");
    </script>
    <?php
    }
};

if(isset($_GET['delete_all'])){
    $email = $_SESSION['email'];
    $response = mysqli_query($con, "DELETE FROM cart WHERE cName = '$email'");
    if($response){?>
        <script>
            swal("Success!", "Your cart has been emptied", "success");
        </script>
        <?php
    }
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
    <link rel="stylesheet" href="cart.css">
    <script src="cart.js"></script>
    <title>Cart</title>
</head>
<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <?php 
        $email = $_SESSION['email'];
        $result = mysqli_query($con,"SELECT * FROM cart WHERE cName = '$email'");
        $grand_total = 0;
        ?>
    
    <div class="container">

        <div class="card-product">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Sr.no</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td style="width: 7%;">#<?php echo $row['2'] ?></td>
                        <td style="width: 7%;"><?php echo $row['3'] ?></td>
                        <td style="width: 25%;"><?php echo $row['4'] ?></td>
                        <td style="width: 15%;">$<?php echo $row['5'] ?></td>
                        <td style="width: 15%;">

                        <form action="" method="post">
                            <input style="width: 30%; border:0;" type="number" name="pruduct_qty" min="1" value="<?php echo $row['6'] ?>">
                            <input type="hidden" name="pruduct_no" value="<?php echo $row['2'] ?>">

                        </td>
                        <td style="width: 15%;">$<?php echo $sub_total = number_format($row['pPrice'] * $row['pQty']) ?></td>
                        <td style="width: 11%;"><button name="update_cart" class="btn btn-primary"><i class="fa fa-bookmark"></i></button></td>
                        <td><a href="cart.php?remove=<?php echo $row['2'] ?>" onclick="return confirm('remove item from cart?')" class="btn btn-danger"><i class="fas fa-trash"></i></a></td>
                        </form>
                    </tr>
                    <?php

                    $grand_total += $sub_total;

                       }

                     ?>
                    <tr>
                        <td colspan="4"></td>
                        <td><a href="cart.php?delete_all" onclick="return confirm('Are you sure to delete all?')" class="btn btn-danger">Empty Cart</a></td>
                        <td><a class="btn btn-warning" href="shopping.php">Shop More</a></td>
                        <td><button id="checkOut" onclick="CheckOut()" class="btn btn-success" value="Check-Out">Check Out</button></td>
                        <td><strong>Total: $<?php echo $grand_total; ?></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="checkoutListBox" class="checkoutListBox">

        <div class="checkoutContent">
            <form action="" method="post">

            <?php
                $email = $_SESSION['email'];
                $sql = "select * from createaccount where email = '$email'";
                $result = mysqli_query($con,$sql) or
                die ("Record not found");
       
                $row = mysqli_fetch_row($result);
                if (isset($row)){
            ?>

                <div class="left">
                    <h6>Username</h6>
                    <input name="customer_name" id="sameUser" type="text">
                </div>

                <div class="right">
                    <h6>Shipping time</h6>
                    <input type="text" readonly value="3-5 Days">
                </div>

                <div class="left">
                    <h6>Email</h6>
                    <input name="customer_email" id="sameEmail" type="text">
                </div>

                <div class="right">
                    <h6>Shipping fee <strong>$</strong></h6>
                    <input type="text" readonly value="0">
                </div>

                <div class="left">
                    <h6>Phone</h6>
                    <input name="customer_phone" maxlength="8" id="samePhone" type="text">
                </div>

                <?php
                }
                ?>

                <div class="right">
                    <h6>Total price <strong>$</strong></h6>
                    <input name="total_price" type="text" readonly value="<?php echo $grand_total; ?>">
                </div>

                <div class="checkBOX">
                    <h6><input id="cbs" onclick="CBSHs()" type="checkbox">Same account?</h6>
                </div>

                <div class="district">
                    <h6>District</h6>
                    <select name="customer_district" id="">
                        <option value="Aaley">Aaley</option>
                        <option value="Akkar">Akkar</option>
                        <option value="Baabda">Baabda</option>
                        <option value="Baalbek">Baalbek</option>
                        <option value="Batroun">Batroun</option>
                        <option value="Bcharreh">Bcharreh</option>
                        <option value="Beirut">Beirut</option>
                        <option value="Bent-Jbayl">Bent-Jbayl</option>
                        <option value="Beqaa">Beqaa</option>
                        <option value="Chouf">Chouf</option>
                        <option value="Hasbaya">Hasbaya</option>
                        <option value="Hermel">Hermel</option>
                        <option value="Jbeil">Jbeil</option>
                        <option value="Jezzin">Jezzin</option>
                        <option value="Keserwan">Keserwan</option>
                        <option value="Koura">Koura</option>
                        <option value="Marjaayoun">Marjaayoun</option>
                        <option value="Matn">Matn</option>
                        <option value="Minieh-Danniyeh">Minieh-Danniyeh</option>
                        <option value="Nabatiyeh">Nabatiyeh</option>
                        <option value="Rachaiya">Rachaiya</option>
                        <option value="Saida">Saida</option>
                        <option value="Tripoli">Tripoli</option>
                        <option value="Tyr">Tyr</option>
                        <option value="Zahle">Zahle</option>
                        <option value="Zgharta">Zgharta</option>
                    </select>
                </div>

                <div class="right">
                    <h6>Street</h6>
                    <input name="customer_street" type="text">
                </div>

                <div class="left">
                    <h6>Building</h6>
                    <input name="customer_building" type="text">
                </div>

                <br><br><br>

                <div class="checkBOX">
                    <h6>Payment method</h6>
                    <p><input type="checkbox">Cash on delivery</p>
                </div>

                <button name="sheckout_btn">Confirm</button>

            </form>
            <i onclick="closeCheckoutBox()" class="fa fa-close"></i>
        </div>

    </div>

    <script>
        function CBSHs(){
        if(document.getElementById("cbs").checked == true){
                document.getElementById("sameUser").value = "<?php echo $row['1'] ?>";
                document.getElementById("sameEmail").value = "<?php echo $row['2'] ?>";
                document.getElementById("samePhone").value = "<?php echo $row['3'] ?>";
        }else{
                document.getElementById("sameUser").value = "";
                document.getElementById("sameEmail").value = "";
                document.getElementById("samePhone").value = "";
        }
        }

        function CheckOut(){
        document.getElementById("checkoutListBox").style.visibility="visible";
}

        function closeCheckoutBox(){
        document.getElementById("checkoutListBox").style.visibility="hidden";
}

    </script>

<?php

include('connection.php');

$email = $_SESSION['email'];

if(isset($_POST['sheckout_btn'])){

$customer_name = $_POST['customer_name'];
$customer_email = $_POST['customer_email'];
$customer_phone = $_POST['customer_phone'];
$customer_district = $_POST['customer_district'];
$customer_street = $_POST['customer_street'];
$customer_building = $_POST['customer_building'];
$total_price = $_POST['total_price'];

$cart_query = mysqli_query($con, "SELECT * FROM cart WHERE cName = '$email'");
if(mysqli_num_rows($cart_query)){
    while($row = mysqli_fetch_assoc($cart_query)){
        $product_title[] = $row['pTitle'] .' ('. $row['pQty'] .')';
        $product_no[] = $row['pNo'];
    }
}

$all_products = implode(', ', $product_title);
$all_products_no = implode(', ', $product_no);
$sql="INSERT INTO chekout (customer_name,
                           customer_email,
                           customer_phone,
                           customer_district,
                           customer_street,
                           customer_building,
                           all_products,
                           all_products_no,
                           total_price)
                VALUES('$customer_name',
                        '$customer_email',
                        '$customer_phone',
                        '$customer_district',
                        '$customer_street',
                        '$customer_building',
                        '$all_products',
                        '$all_products_no',
                        '$total_price')";
$result=mysqli_query($con,$sql);
if($result){?>
    <script>
    swal("Congrats!", "Thank you for shopping", "success");
    </script>
    <?php
}
}
?>

</body>
</html>