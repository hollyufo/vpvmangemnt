<?php
  if(isset($_POST['save'])){

    $name = $_POST['ename'];
    $type = $_POST['type'];

        
    // adding it to the data base
    $sql = "INSERT INTO expence VALUES (null,'$name','$type')";
        
    if(mysqli_query($connection, $sql)){
        header('location: employee.php?user='.$name.'');   

    } else{
        echo "ERROR: Hush! Sorry $sql. " 
            . mysqli_error($connection);
    }
        
    // Close connection
    mysqli_close($connection);
    }

?>