<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Register'])) {    $conn = new mysqli("localhost", "root", "", "users_db");
    $conn = new mysqli("localhost", "root", "", "users_db");    
if ($conn->connect_error) die("Error connexió");


     $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    $result = $conn->query($sql); 
    if ($result){
    $_SESSION['username']=$username;
    // $_SESSION['password']=$password;
    header("Location: ../libreria/index.html");
    exit();
    } else {
        echo "Registration error";
    }
   }