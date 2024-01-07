<?php
include("../../connection.php");
$id = $_GET["id"];
$sql = "update trip set state = 0 where id = $id";
mysqli_query($conn, $sql);
header("location:viewtrip.php");
