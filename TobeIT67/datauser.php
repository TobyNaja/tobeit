<?php 
session_start();
include("../Page/dbconnect.php");
$UserID=$_SESSION["userid"];
$sql="SELECT * FROM user WHERE userid=$UserID";
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
    <link rel="stylesheet" href="../stylesheet/css/bootstrap.css">

</head>
<body>
    <div class="card m-1" style="width: 30rem;">
    
        <img src="Uimg/<?php echo $row['Userimage']; ?>" width="100" >
        <div class="card-body">
            <h5 class="card-title">ข้อมูลส่วนตัว</h5>
            <p class="card-text">รหัสลูกค้า : <?php  echo $row['UserID']; ?></p>
            <p class="card-text">ชื่อผู้ใช้ : <?php  echo $row['Username'] ?></p>
            <p class="card-text">ชื่อ-สกุล : <?php  echo $row['Userfname']." ".$row['Userlname'] ?></p>
            <p class="card-text">เบอร์มือถือ : <?php  echo $row['Userphone'] ?></p>
            <p class="card-text">ที่อยู่ : <?php  echo $row['Useraddress'] ?></p>
        </div>
        
    </div>
    <a href="updateuser.php" class="btn btn-warning m-1">แก้ไขข้อมูล</a>
    <?php echo "<a href='../Admin/Delete.php?UserID=$row[0]' class='btn btn-danger' onclick=\" return confirm('ต้องการลบบัญชีหรือไม่')\">ลบบัญชี</a>"; ?>
    <a href="user-page.php" class="btn btn-success m-1">กลับ</a>

</body>
</html>

