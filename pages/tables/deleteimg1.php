<?php
include('../../connection.php');

$id = $_GET["id"];
$tripid = $_GET["tripid"];

// Use prepared statement to prevent SQL injection
$sql = "DELETE FROM images WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("location: ../forms/edittrip.php?id=" . $tripid);
