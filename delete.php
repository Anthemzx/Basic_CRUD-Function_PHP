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

    $sql = "DELETE FROM toko WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("refresh:1; url=index.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
