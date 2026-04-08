<?php

header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "books_db");
if ($conn->connect_error) {
    echo json_encode(["status" => "KO", "error" => $conn->connect_error]);
    exit;
}
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
if ($result) {
    $books = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($books);
} else {
    echo json_encode([]);
}
$conn->close();

?>