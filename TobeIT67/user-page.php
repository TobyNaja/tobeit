<?php 
session_start();
if(!(isset($_SESSION['userid']))){
    header("Location: userlogin.php");
} else {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>User</title>
</head>
<body>
<?php include "nav.php";?>
<div class="container p-3">
    <div class="row justify-content-sm-center">
        
        <div class="card" style="width: 18rem;">
        <img src="img/<?php echo $_SESSION['img']; ?>" class="card-img-top" alt="img">
            <div class="card-body">
                <h5 class="card-title"><?php echo $_SESSION['name']." ".$_SESSION['lname']; ?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                                
                        <li class="list-group-item">ID : <?php echo $_SESSION['userid']; ?></li>
                        <li class="list-group-item">Username : <?php echo $_SESSION['username']; ?></li>
                        <li class="list-group-item">Password : <?php echo $_SESSION['password']; ?></li>
                        <li class="list-group-item">Name : <?php echo $_SESSION['name']; ?></li>
                        <li class="list-group-item">Last name : <?php echo $_SESSION['lname']; ?></li>
                        <li class="list-group-item">Birthday : <?php echo $_SESSION['birthday']; ?></li>
                        <li class="list-group-item">Tel. : <?php echo $_SESSION['phone']; ?></li>
                        <li class="list-group-item">Car license plate : <?php echo $_SESSION['car']; ?></li>

                    </ul>
                    <div class="card-body">
                <a href="updateuser.php" class="card-link">แก้ไขข้อมูล</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php } ?>