<?php 
include "dbconnect.php";
if(!empty($_GET["faceid"])){
    $faceid=$_GET['faceid'];
    $sql="UPDATE face SET payment='P' WHERE faceid=$faceid ";
    $result=mysqli_query($connect,$sql);
    if($result){
        header("Location: index.php");
    }
}

?>