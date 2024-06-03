<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $enc_pass = md5($password);

    if(!empty($email) && !empty($password)){

        $check_user_query = "SELECT * FROM users WHERE email = '$email' and password = '$enc_pass' ";
        $check_user_query_run = mysqli_query($conn, $check_user_query);

        if(mysqli_num_rows($check_user_query_run) == 1){
            // echo "Logged In successfuly";

            header("Location: home.php");
        }else{
            echo "email or password dont match";
        }

    }
    else{
        echo "Email or password cannot be empty";
    }

}

?>