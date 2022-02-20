<?php 
    
    include('config/db.php');
    if(!$_SESSION['login']){
      header("location: index.php");
      die;
   }
   else{
    $employee_id = $_GET['id'];
    mysqli_query($connection, "DELETE FROM employee WHERE employeeid=$employee_id");
    echo "<script>window.location.href = './employee.php';</script>";
   }