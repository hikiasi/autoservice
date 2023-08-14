<?php
include('security.php');
//Авторизация
//Для авторизации
if(isset($_POST['login_btn']))
{
    $login_login = $_POST['login'];
    $password_login = $_POST['password'];

    $query_login = "SELECT * FROM login_users WHERE login='$login_login' AND password='$password_login' ";
    $query_login_run = mysqli_query($connection, $query_login);

    if(mysqli_fetch_array($query_login_run))
    {
        $_SESSION['username'] = $login_login;
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = 'Логин или пароль введены не верно';
        header("Location: login.php");
    }
}

//Для регистрации
if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}