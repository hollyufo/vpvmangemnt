<?php 
if(isset($_POST['departement'])){
    // taking values from the form
    $name =  $_POST['depname'];
    // adding it to the data base
    $sql = "INSERT INTO dep VALUES (null,'$name')";
        
    if(mysqli_query($connection, $sql)){
        header('location: departement.php');   

    } else{
        echo "ERROR: Hush! Sorry $sql. " 
            . mysqli_error($connection);
    }
        
    // Close connection
    mysqli_close($connection);
    }

?>