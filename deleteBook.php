<?php
// CODE HERE
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "books_db");
if ($conn->connect_error) die("Error connexió");
if (!isset($_POST['id'])) {
    echo json_encode(["status" => "KO", "error" => "No id"]);
    exit;
}

$id = $_POST['id'];
$sql="DELETE FROM books WHERE id=$id";
$result = $conn->query($sql);
if ($result === TRUE) {
    echo json_encode(["status" => "OK"]);
} else {
    echo json_encode(["status" => "KO"]);
}
$conn->close();
?>