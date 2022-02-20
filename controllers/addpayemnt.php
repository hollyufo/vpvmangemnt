<?php 
if(isset($_POST['payment'])){
    echo 'what';
    // taking values from the form
    $amount =  $_POST['amount'];
    $date =  $_POST['datee'];
    $reason = $_POST['reason'];
    $user =  $_POST['user'];
        
    // adding it to the data base
    $sql = "INSERT INTO payroll VALUES (null,'$amount','$date', 
        '$reason','$user')";
        
    if(mysqli_query($connection, $sql)){
        header('location: payments.php');   

    } else{
        echo "ERROR: Hush! Sorry $sql. " 
            . mysqli_error($connection);
    }
        
    // Close connection
    mysqli_close($connection);
    }

?>