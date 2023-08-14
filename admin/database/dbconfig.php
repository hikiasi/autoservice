<?php

$server_name = "localhost";
$db_username = "root";
$db_password = "root";
$db_name = "autoservice";

$connection = mysqli_connect($server_name,$db_username,$db_password,$db_name);
$dbconfig = mysqli_select_db($connection, $db_name);


// if (!$connection) {
//     echo "Error: Unable to connect to MySQL." . PHP_EOL;
//     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
//     exit;
//   }


if($dbconfig)
{
    // echo "БД подключена";
}
else
{
    die(mysqli_connect_error());
    echo '
        <div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
                    <div class="card">image.png
                        <div class="card-body">
                            <h1 class="card-title bg-danger text-white"> Подключение к БД не удалось </h1>
                            <h2 class="card-title"> БД потерпело неудачу </h2>
                            <p class="card-text"> Пожалуйста проверьте ваше подключение к БД.</p>
                            <a href="#" class="btn btn-primary">:( </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
}
?>