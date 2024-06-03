
<?php

require 'connection.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' ){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $enc_password = md5($password);

    if(!empty($email) && !empty($password)){
        
        $check_user_query = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
        $check_user_query_run = mysqli_query($conn, $check_user_query);

        if(mysqli_num_rows($check_user_query_run) > 0){
            echo "Email already exist.";
        }
        else{
            $create_user_query = "INSERT INTO users (email, password) VALUES ('$email', '$enc_password')";
            $create_user_query_run = mysqli_query($conn, $create_user_query);

            if($create_user_query_run){
                echo "registered Successfully";
            }
            else{
                echo "Something Went wrong";
            }

        }

    }
    else{
        echo "Email or password cannot be empty";
    }

    

}

?>