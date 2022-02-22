<?php 
    
    include('config/db.php');
    if(!$_SESSION['login']){
      header("location: index.php");
      die;
   }
   else{
    $payroll_id = $_GET['id'];
    mysqli_query($connection, "DELETE FROM payroll WHERE payrollid=$payroll_id");
    echo "<script>window.location.href = './payments.php';</script>";
   }