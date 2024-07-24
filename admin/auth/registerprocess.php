<?php
require("../config/config.php");
 
 if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

   if($username !== "" && $email !=="" && $password !==""){
     $check= "SELECT * FROM users WHERE = '$username' OR email='$email' ";
     $result= mysqli_query($conn,$check);

     if($result->num_rows>0){
        echo "<div class='alert alert-primary' role='alert'>
        Username or Email already exist!!</div>";
        header("refresh:0; url=../register.php?msg=registerfail");

     } else{
             $query="INSERT INTO users(username,email,password) VALUES ('$username','$email','$password')";
              $result= mysqli_query($conn,$query);   
              if($result){
               header("refresh:0; url=../index.php?msg=success"); 
               }else{
                header("refresh:0; url=../register.php?msg=error;");

                }
            }
    }else{
        header("refresh:0; url=../register.php?msg=emptyfield");
    }
 }
 ?>