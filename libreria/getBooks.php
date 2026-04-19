<?php

session_start();
include "session.php";
$conn = new mysqli("localhost", "root", "", "books_db");
if ($conn->connect_error) die("Error connexió");
// header('Content-Type: application/json');

$sql = "SELECT * FROM books";
$result = $conn->query($sql);
$books = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($books);
