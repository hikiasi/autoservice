<?php
// session_start();
include('database/dbconfig.php');

// if (!$connection) {
//     echo "Error: Unable to connect to MySQL." . PHP_EOL;
//     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
//     exit;
//   }

if($dbconfig)
{
    // echo "Database Connected";
}
else
{
    header("Location: database/dbconfig.php");
    exit;
}

// if(!isset($_SESSION['username']))
// {
//     header("Location: login.php");
//     exit;
// }
?>