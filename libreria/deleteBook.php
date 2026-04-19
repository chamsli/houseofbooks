<?php

session_start();
include "session.php";
$conn = new mysqli("localhost", "root", "", "books_db");
if ($conn->connect_error) die("Error connexió");
// header('Content-Type: application/json');

$id = $_POST["id"];

$sql = "DELETE FROM books WHERE id='$id'";
$result = $conn->query($sql);
if($result != false){
    echo json_encode(["status"=>"ok"]);
}
else{
    echo json_encode(["status"=>"ko"]);
}

