<?php
if(isset($_POST['save'])){
    // taking values from the form
    $lastname =  $_POST['lastname'];
    $firstname =  $_POST['firstname'];
    $Email = $_POST['Email'];
    $Phone =  $_POST['phone'];
    $depart = $_POST['deb'];
        
    // adding it to the data base
    $sql = "INSERT INTO employee VALUES (null,'$lastname','$firstname', 
        '$Email','$Phone','$depart')";
        
    if(mysqli_query($connection, $sql)){
        header('location: employee.php');   

    } else{
        echo "ERROR: Hush! Sorry $sql. " 
            . mysqli_error($connection);
    }
        
    // Close connection
    mysqli_close($connection);
    }

?>