<?php

    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $conn = new mysqli("localhost", "root", "", "users_db");
        if ($conn->connect_error) die("Error connexió");
    
        $username = $conn->real_escape_string($_POST['username']);
        $password = $_POST['password'];
    
        $sql = "SELECT password FROM users WHERE username = '$username'";
        $result = $conn->query($sql);
    
        if ($result && $row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                header("Location: ../libreria/index.html");
                exit();
            }
        }
        echo "Wrong username or password";
        header("Location: login.html?error=1");
    exit();
    }