<?php
include('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet">
    <title>เข้าสู่ระบบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="justify-content-center m-3">
        <h2>เข้าสู่ระบบ</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="Username">ชื่อผู้ใช้ :</label>
                <input type="text" name="Username" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="Password">รหัสผ่าน :</label>
                <input type="password" name="Password" class="form-control">
            </div>
            <input type="submit" value="เข้าสู่ระบบ" class="btn btn-success">
            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger">
            <a href="index.php" class="btn btn-warning">กลับหน้าแรก</a>
        </form>
    </div>
    <?php 
    session_start();
    if(isset($_POST['Username'])){
        $username=$_POST['Username'];
        $password=$_POST['Password'];

        $sql="SELECT * FROM user WHERE username='".$username."' and password='".$password."' ";

        $result=mysqli_query($connect,$sql);

            if(mysqli_num_rows($result)==1){
                $row = mysqli_fetch_array($result);

                $_SESSION['userid']=$row['userid'];
                $_SESSION['username']=$row['username'];
                $_SESSION['password']=$row['password'];
                $_SESSION['name']=$row['name'];
                $_SESSION['lname']=$row['lname'];
                $_SESSION['birthday']=$row['birthday'];
                $_SESSION['phone']=$row['phone'];
                $_SESSION['car']=$row['car'];
                $_SESSION['img']=$row['img'];
                header("Location: index.php");
            }

    } 
    // else {
    //     header("Location: userlogin.php");
    // }
    ?>
</body>
</html>

