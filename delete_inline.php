<?php
include("connection.php");
$id = $_GET['id'];
$sql = "DELETE FROM person
WHERE id = $id";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query Not Executed" . mysqli_connect_error());
}
header("Location: http://localhost/crud_self/index.php");
mysqli_close($conn);
?>