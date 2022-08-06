
<?php

include('connection.php');

session_start();

$p_no = $_SESSION['p_no'];
$USER = $_SESSION['USER'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a5fdfa1bd7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="review.css">
</head>
<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div id="allReviews" class="allReviews">
        <div class="review_content">
            <h4>Review this product.</h4>
            <h6>#<?php echo $p_no ?></h6>
            <form action="" method="post">
            <input type="hidden" name="r_no" value="<?php echo $p_no ?>">
            <input type="hidden" name="r_user" value="<?php echo $USER ?>">
            <input type="text" name="review" placeholder="Write a review...">
            <button name="btn_review">submit</button>
            </form>
           <a href="shopping.php"><i onclick="closeReviews()" class="fa fa-close"></i></a>

           <?php
           
           $result = mysqli_query($con,"SELECT * FROM reviews WHERE r_no = $p_no");
           while($row = mysqli_fetch_array($result)) {

           ?>

            <div class="peopleReviews">
                <img src="images/profile.png" alt=""><label><?php echo $row['r_name'] ?></label>
                <p><?php echo $row['review'] ?></p>
            </div>

            <?php } ?>

        </div>
    </div>

    <?php
    
    if(isset($_POST['btn_review'])){
        $r_no = $_POST['r_no'];
        $r_name = $_POST['r_user'];
        $review = $_POST['review'];

        if($review === ""){
            ?>
            <script>
                swal("Error!", "Please write a review!", "error");
            </script>
            <?php
        }
        else{
        $sql="INSERT INTO reviews (r_no, r_name, review) VALUES('$r_no', '$r_name', '$review')";
        $results=mysqli_query($con,$sql);

        if($results){?>
            <script>
                swal("Success!", "Review added!", "success");
            </script>
            <?php
            header("Location: shopping.php");
        }
    }
}
    
    
    ?>

</body>
</html>