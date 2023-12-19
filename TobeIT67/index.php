<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
    <?php include "nav.php";?>
    <div class="container">
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="form-group">
            <label for="Phone">เวลา :</label>
            <input type="time" name="time" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Phone">การชำระเงิน :</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" value="P">
                    <label class="form-check-label" for="payment">
                    ชำระแล้ว
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" value="N" checked>
                    <label class="form-check-label" for="payment">
                        ยังไม่ชำระ
                    </label>
                </div>
        </div>
        <div class="form-group">
            <label for="Image">หน้า :</label>
            <input type="file" name="img" accept="image/*" class="form-control">
        </div>
        <input type="submit" value="บันทึก" class="btn btn-success mt-1">
        <input type="reset" value="ล้างข้อมูล" class="btn btn-danger mt-1">
    </form>
</div>


<?php 
include('dbconnect.php');
$sql = "SELECT * FROM face WHERE payment = 'N'";
$result = mysqli_query($connect,$sql);

while ($row=mysqli_fetch_array($result)){ ?>
    <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/<?php echo $row["img"] ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Time : <?php echo $row["time"] ?></h5>
        <?php echo "<a href='payment.php?faceid=$row[0]' class='btn btn-success'>จ่ายแล้ว</a>" ?>
      </div>
    </div>
  </div>
</div>
<?php }

if(isset($_POST['time'])){
    $time =$_POST['time'];
    $payment =$_POST['payment'];

    $dir="img/";
    $filename=$dir.basename($_FILES["img"]["name"]);
    move_uploaded_file($_FILES["img"]["tmp_name"],$filename);
    $img=basename($_FILES["img"]["name"]);

    $sql="INSERT INTO face (time,payment,img) VALUES('$time','$payment','$img')";
    $result=mysqli_query($connect,$sql);

    if($result){
        echo '
				<script>
                    alert("ลงทะเบียนสำเร็จ!!")
				</script>
				';
    } else {
        echo mysqli_error($connect);
    }

}

?>
</body>
</html>