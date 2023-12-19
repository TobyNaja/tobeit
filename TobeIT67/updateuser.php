<?php 
session_start();
include("dbconnect.php");
$userid=$_SESSION["userid"];
$sql="SELECT * FROM user WHERE userid=$userid";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css.css">

</head>
<body>
<?php include "nav.php";?>
<div class="row justify-content-sm-center">   
<div class="card m-1" style="width: 30rem;">
<form action="" method="post" enctype="multipart/form-data">
        <center><img  src="img/<?php echo $row['img']; ?>" width="100" ></center><br>
        <input type="file" name="img" accept="image/*" class="btn btn-info" >
        <input type='submit' value='เปลี่ยนรูป' class='btn btn-success m-1'>
</form>
    <form action="update.php" method="post" enctype="multipart/form-data">
        

            <div class="card-body">
                <h5 class="card-title">ข้อมูลส่วนตัว</h5>
                <label class="card-text">รหัสลูกค้า : </label>
                <input type="text" disabled="disabled" value="<?php  echo $row['userid']; ?>" class="form-control" name="userid" required>
                <input type="hidden" name="userid" value="<?php echo $row['userid']; ?>"><br>

                <label class="card-text">ชื่อผู้ใช้ : </label>
                <input type="text"  value="<?php  echo $row['username']; ?>" class="form-control" name="username" required><br>

                <label class="card-text">รหัสผ่าน : </label>
                <input type="Password"  value="<?php  echo $row['password']; ?>" class="form-control" name="password" required><br>

                <label class="card-text">ชื่อ : </label>
                <input type="text"  value="<?php  echo $row['name']; ?>" class="form-control" name="name" required><br>

                <label class="card-text">สกุล : </label>
                <input type="text"  value="<?php  echo $row['lname']; ?>" class="form-control" name="lname" required><br>

                <label class="card-text">เบอร์มือถือ : </label>
                <input type="text" value="<?php  echo $row['phone']; ?>" class="form-control" name="phone" required><br>

                <label class="card-text">ทะเบียนรถ : </label>
                <input type="text" value="<?php  echo $row['car']; ?>" class="form-control" name="car" required><br>
            </div>
        <input type='submit' value='บันทึกข้อมูล' class='btn btn-success m-1'>
            <a href="user-page.php" class="btn btn-light">กลับ</a>
        </form>
        </div>
            
        
</div>
    <?php 
    if(!empty($_POST['img'])) {
        $dir="img/";
        $filename=$dir.basename($_FILES["img"]["name"]);
        move_uploaded_file($_FILES["img"]["tmp_name"],$filename);
        $Userimage=basename($_FILES["img"]["name"]);

        $sqli="UPDATE user SET
        img='$Userimage'
        WHERE userid='$UserID'";
        $_SESSION['img'] = $Userimage;
    }
    
    ?>
</body>
</html>

