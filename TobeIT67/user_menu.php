<?php 
include("../Page/dbconnect.php");
session_start();

if(!isset($_SESSION['UserID'])){
    header("Location:userlogin.php");
} else { 
    $id=$_GET['SelID']; 
    $sql="SELECT * FROM tb_food WHERE SelID=$id ";
    $result=mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheet/css/bootstrap.css">
</head>
<body>

  <div class="container">
    <div class="row">
      <?php while ($row=mysqli_fetch_array($result)){ ?>
    <div class="card m-1" style="width: 18rem;">
      <img src="../Seller/fdimg/<?php echo $row['fdImage'];?>" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['fdName'];?></h5>
          <p class="card-text"><?php echo $row['fdPrice'];?></p>
          <p class="card-text"><?php echo $row['fdDetails'];?></p>
          <a href="cart.php?id=<?php echo $row['FoodID']; ?>&act=add" class="btn btn-primary">เพิ่มลงตะกล้า</a>
        </div>
    </div>
  <?php } ?>
  
</div><a href="user-page.php" class="btn btn-success mt-1">กลับหน้าแรก</a>
</div>

</body>
</html>
<?php } ?> 
