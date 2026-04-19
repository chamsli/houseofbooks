<?php

require_once "../session/session.php";

$conn = new mysqli("localhost", "root", "", "books_db");
if ($conn->connect_error) die("Error connexió");
// header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"));
$title = $data->title;
$author = $data->author;
$year = $data->year;

$sql = "INSERT INTO books (title, author, year) VALUES ('$title','$author','$year')";
$result = $conn->query($sql);
if($result != false){
    echo json_encode(["status"=>"ok"]);
}
else{
    echo json_encode(["status"=>"ko"]);
} 


