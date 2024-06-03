
<?php

require 'connection.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' ){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    echo $password;

}

?>