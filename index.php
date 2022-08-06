



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a5fdfa1bd7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
    <title>Login</title>
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <i class="fas fa-shipping-fast"></i> &nbsp;&nbsp; <strong>E-commerce</strong>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link act" aria-current="page" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">SignUp</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="forms">

        <h2>Login</h2>

        <form name="frm" action="" method="post">

            <div class="data">
                <i class="fa fa-envelope"></i><input class="emailInput" type="email" id="email" name="email" required>
                <label class="emailLable" for="">Email</label>
            </div>

            <br><br>

            <div class="data">
                <i class="fa fa-key"></i><input class="passwordInput" type="password" id="password" name="password" required>
                <label class="passwordLable" for="">Password</label>
            </div>

            <div class="btn">
                <button name="login_user">Login</button>
            </div>

            <h6>New here? | <a class="create" href="signup.php">Create account</a></h6>

        </form>

    </div>

</div>

<?php

include('connection.php');

session_start();

if(isset($_POST['login_user'])){
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select * from createaccount where email = '$email' && password = '$password'";
$result = mysqli_query($con,$sql) or
die ("Record not found");
   
$row = mysqli_fetch_row($result);
   if (isset($row)){
    $_SESSION['email'] = $email;
    header("Location:shopping.php");
   }
   else{?>
    <script>
        swal("Warning!", "Invalid email or password!", "warning");
    </script>
    <?php
   }
  mysqli_free_result($result);

mysqli_close($con);
}

?>

</body>

</html>