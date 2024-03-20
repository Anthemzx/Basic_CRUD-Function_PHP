<?php

// Establish database connection
$conn = new mysqli("localhost", "root", "", "tokodb");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$gambar = $conn->real_escape_string($_POST['gambar']);
$nama = $conn->real_escape_string($_POST['nama']);
$harga = $conn->real_escape_string($_POST['harga']);
$tersedia = $conn->real_escape_string($_POST['tersedia']);
$beli = $conn->real_escape_string($_POST['beli']);

$sql = "INSERT INTO toko (gambar, nama, harga, tersedia, beli) VALUES ('$gambar', '$nama', '$harga', '$tersedia', '$beli')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully. Redirecting...";
    header("refresh:1; url=index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

