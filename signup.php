<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a5fdfa1bd7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="signup.css">
    <script src="signup.js"></script>
    <title>signUp</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

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
                            <a class="nav-link" aria-current="page" href="index.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link act" href="signup.php">SignUp</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="forms">

            <h2>Create account</h2>
    
            <form action="" method="post" id="frm" name="frm">
    
                <div class="data">
                    <i class="fa fa-user"></i><input class="userInput" type="text" name="username" id="username" maxlength="20" required>
                    <label class="userLable" for="">Username</label>
                </div>
    
                <br>
    
                <div class="data">
                    <i class="fa fa-envelope"></i><input class="emailInput" type="email" name="email" id="email" maxlength="50" required>
                    <label class="emailLable" for="">Email</label>
                </div>

                <br>

                <div class="data">
                    <i class="fa fa-mobile"></i><input class="phoneInput" type="text" id="phone" name="phone" maxlength="8" required>
                    <label class="phoneLable" for="">Phone Number</label>
                </div>

                <br>

                <div class="data">
                    <i class="fa fa-key"></i><input class="passwordInput" type="password" id="password" name="password" required>
                    <label class="passwordLable" for="">Password</label>
                </div>

                <br>

                <div class="data">
                    <i class="fa fa-key"></i><input class="confirmPasswordInput" type="password" id="confirmPassword" name="confirmPassword" required>
                    <label class="confirmPasswordLable" for="">Confirm Password</label>
                </div>
    
                <div class="btn">
                    <button name="create_account" onclick="create()">Sign Up</button>
                </div>

                <h6>Already have an account? | <a class="login" href="index.php">Login</a></h6>
    
            </form>
            
        </div>

    </div>

    <?php

include('connection.php');

if(isset($_POST['create_account'])){
$username=$_POST['username'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$confirmPassword=$_POST['confirmPassword'];

$sql1="SELECT * FROM createaccount where email='$email'";
$result=mysqli_query($con,$sql1);
$present=mysqli_fetch_row($result);
if($present>0){?>
    <script>
        swal("Warning!", "Email already exist!", "warning");
    </script>
    <?php
}
else if($confirmPassword != $password){?>
    <script>
        swal("Error!", "Password mismatch!", "error");
    </script>
    <?php
}
else{
$sql2="INSERT INTO createaccount (username, email, phone, password) VALUES('$username', '$email', '$phone', '$password')";
$results=mysqli_query($con,$sql2);
if($results){?>
    <script>
        swal("Success!", "Account has been created!", "success");
    </script>
    <?php
}
}
}

?>
    
</body>
</html>