<?php 
   
    
    include('config/db.php'); 
    include('./controllers/time.php');
    if(!$_SESSION['login']){
      header("location: index.php");
      die;
   }

   else{
    $dep_id = $_GET['id'];
    mysqli_query($connection, "DELETE FROM dep WHERE depid=$dep_id");
    echo "<script>window.location.href = './departement.php';</script>";
   }