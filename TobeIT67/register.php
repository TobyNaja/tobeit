<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="css.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <h2 class="m-3">Register</h2>
    <ul class="nav nav-tabs justify-content-center">
    </ul>
    <div class="tab-content m-3">
        <div id="tab1" class="tab-pane fade show active">
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="form-group">
            <label for="Username">ชื่อผู้ใช้ :</label>
            <input type="text" name="username" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Password">รหัสผ่าน :</label>
            <input type="Password" name="password" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Firstname">ชื่อจริง :</label>
            <input type="text" name="name" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Lastname">นามสกุล :</label>
            <input type="text" name="lname" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Address">วันเกิด :</label>
            <input type="date" name="birthday" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Phone">เบอร์มือถือ :</label>
            <input type="text" name="phone" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Phone">ทะเบียนรถ :</label>
            <input type="text" name="car" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Image">ภาพโปรไฟล์ :</label>
            <input type="file" name="img" accept="image/*" class="form-control">
        </div>
        <input type="submit" value="บันทึก" class="btn btn-success mt-1">
        <input type="reset" value="ล้างข้อมูล" class="btn btn-danger mt-1">
        <a href="index.php" class="btn btn-warning mt-1">กลับหน้าแรก</a>

    </form>
        </div>

        
    </div>
</body>
</html>

<?php 

include('dbconnect.php');
if(isset($_POST['username'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $name=$_POST['name'];
    $lname=$_POST['lname'];
    $birthday=$_POST['birthday'];
    $phone=$_POST['phone'];
    $car=$_POST['car'];

    $dir="img/";
    $filename=$dir.basename($_FILES["img"]["name"]);
    move_uploaded_file($_FILES["img"]["tmp_name"],$filename);
    $img=basename($_FILES["img"]["name"]);

    $sql="INSERT INTO user (username,password,name,lname,birthday,phone,car,img) VALUES('$username','$password','$name','$lname','$birthday','$phone','$car','$img')";
    $result=mysqli_query($connect,$sql);

    if($result){
        echo '
				<script>
                    alert("ลงทะเบียนสำเร็จ!!")
				</script>
				';
        header("Location: userlogin.php");
    } else {
        echo mysqli_error($connect);
    }

}
?>