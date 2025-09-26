<?php
include("db_connect.php");
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM students WHERE id=?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    header("Location: select.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
