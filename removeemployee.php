<?php 
    
    include('config/db.php');
    include('./controllers/time.php');
    include('./controllers/time.php');
    if(!$_SESSION['login']){
      header("location: index.php");
      die;
   }
   else{
    $expence_id = $_GET['id'];
    mysqli_query($connection, "DELETE FROM expence WHERE expenceid=$expence_id");
    header('location: employee.php?deleted=1');   
   }