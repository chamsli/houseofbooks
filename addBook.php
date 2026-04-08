<?php
// CODE HERE
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "books_db");
if ($conn->connect_error) die(json_encode(["status" => "KO"]));
// COMPLETE CODE
$data = json_decode(file_get_contents("php://input"), true);
$title =$data['title'];
$author = $data['author'];
$year = $data['year'];

$sql= "INSERT INTO books (title,author,year) VALUES('$title','$author','$year')";
$result = $conn->query($sql);
if ($result === TRUE) {
    echo json_encode(["status" => "OK"]);
} else {
    echo json_encode(["status" => "KO"]);
}
$conn->close();
?>

 