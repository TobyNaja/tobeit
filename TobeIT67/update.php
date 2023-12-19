<?php 
session_start();
include("dbconnect.php");
if($_POST['userid']!=""){
    $UserID=$_POST['userid'];
    $Username=$_POST['username'];
    $Password=$_POST['password'];
    $Userfname=$_POST['name'];
    $Userlname=$_POST['lname'];
    $Userphone=$_POST['phone'];
    $car=$_POST['car'];

    $sqli="UPDATE user SET
        username='$Username',
        password='$Password',
        name='$Userfname',
        lname='$Userlname',
        car='$car',
        phone='$Userphone',
        WHERE userid='$UserID'";
        

    $results=mysqli_query($connect,$sqli);
    if($results){
        echo "
        <script>
        alert('บันทึกข้อมูลสำเร็จ!!')
        </script>
        ";
        $_SESSION['userid']=$row['userid'];
        $_SESSION['username']=$row['username'];
        $_SESSION['password']=$row['password'];
        $_SESSION['name']=$row['name'];
        $_SESSION['lname']=$row['lname'];
        $_SESSION['birthday']=$row['birthday'];
        $_SESSION['phone']=$row['phone'];
        $_SESSION['car']=$row['car'];
        $_SESSION['img']=$row['img'];
        header("Location: user-page.php");
    } else {
        echo mysqli_error($connect);
    };
} else {
    echo "ผิดจ้า";
}

?>