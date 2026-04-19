<?php

session_start();
include "session.php";
$conn = new mysqli("localhost", "root", "", "books_db");
if ($conn->connect_error) die("Error connexió");
// header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
$title = $data->title;
$author = $data->author;
$year = $data->year;

$sql = "UPDATE books SET title='$title', author='$author', year='$year' WHERE id='$id'";
$result = $conn->query($sql);
if($result != false){
    echo json_encode(["status"=>"ok"]);
}
else{
    echo json_encode(["status"=>"ko"]);
}

