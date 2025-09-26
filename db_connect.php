<?php
$host = "localhost";
$user = "root";   // default XAMPP user
$pass = "";       // default XAMPP password is empty
$db   = "student_db";

// Create connection
$conn = new mysqli($host, $user, $pass);

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $db";
$conn->query($sql);

// Select database
$conn->select_db($db);

// Create table if not exists
$table = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    course VARCHAR(50) NOT NULL
)";
$conn->query($table);
?>
