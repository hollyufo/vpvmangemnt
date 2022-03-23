<?php 

    // Enable us to use Headers
    ob_start();

    // Set sessions
    if(!isset($_SESSION)) {
        session_start();
    }
    // $hostname = "localhost";
    // $username = "u993746928_vpv";
    // $password = "12345AZERTY@@a";
    // $dbname = "u993746928_vpvmanagement";
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "management";

    $connection = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.");
    
 
?>