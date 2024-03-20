<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    $conn = new mysqli("localhost", "root", "", "tokodb");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $conn->real_escape_string($_POST['id']);
    $gambar = $conn->real_escape_string($_POST['gambar']);
    $nama = $conn->real_escape_string($_POST['nama']);
    $harga = $conn->real_escape_string($_POST['harga']);
    $tersedia = $conn->real_escape_string($_POST['tersedia']);
    $beli = $conn->real_escape_string($_POST['beli']);

    $sql = "UPDATE toko SET gambar='$gambar', nama='$nama', harga='$harga', tersedia='$tersedia', beli='$beli' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Data updated!";
        header("refresh:1; url=index.php");

    } else {
        echo "Error updating record: " . $conn->error;
      
    }

    $conn->close();
}
