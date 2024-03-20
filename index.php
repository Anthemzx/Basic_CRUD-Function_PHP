
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    
    <script>
        function clearForm() {
            document.getElementById("createForm").reset();
        }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Operations</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Produk Toko CRUD</h2>
    </br>

<!-- Buttons -->
<button onclick="showCreateForm()">Create</button>
<button onclick="showReadForm()">Search</button>
<button onclick="showUpdateForm()">Update</button>
<button onclick="showDeleteForm()">Delete</button>

<!-- CRUD Forms -->
<div id="createForm" style="display: none;">
    <h3>Create Product</h3>
    <form action="create.php" method="post">
        <label for="gambar">Gambar:</label>
        <input type="file" name="gambar" id="gambar">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br>
        <label for="harga">Harga:</label>
        <input type="text" id="harga" name="harga"><br>
        <label for="tersedia">Tersedia:</label>
        <input type="text" id="tersedia" name="tersedia"><br>
        <label for="beli">Beli:</label>
        <input type="text" id="beli" name="beli"><br>
        <input type="submit" value="Submit">
    </form>
</div>

<div id="readForm" style="display: none;">
    <h3>Read Product</h3>
    <form action="read.php" method="get">
        <label for="searchId">Enter Product ID:</label>
        <input type="text" id="searchId" name="id">
        <input type="submit" value="Search">
    </form>
</div>

<div id="updateForm" style="display: none;">
    <h3>Update Product</h3>
    <form action="update.php" method="post">
        <label for="updateId">ID:</label>
        <input type="text" id="updateId" name="id"><br>
        <label for="updateGambar">Gambar:</label>
        <input type="file" name="gambar" id="gambar">
        <label for="updateNama">Nama:</label>
        <input type="text" id="updateNama" name="nama"><br>
        <label for="updateHarga">Harga:</label>
        <input type="text" id="updateHarga" name="harga"><br>
        <label for="updateTersedia">Tersedia:</label>
        <input type="text" id="updateTersedia" name="tersedia"><br>
        <label for="updateBeli">Beli:</label>
        <input type="text" id="updateBeli" name="beli"><br>
        <input type="submit" value="Update">
    </form>
</div>

<div id="deleteForm" style="display: none;">
    <h3>Delete Product</h3>
    <form action="delete.php" method="post">
        <label for="deleteId">Enter Product ID:</label>
        <input type="text" id="deleteId" name="id">
        <input type="submit" value="Delete">
    </form>
</div>
<!-- 
<table>
    <tr>
        <th>ID</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Tersedia</th>
        <th>Beli</th>
    </tr> -->
    



    <?php
// Establish database connection
$conn = new mysqli("localhost", "root", "", "tokodb");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, gambar, nama, harga, tersedia, beli FROM toko";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Gambar</th><th>Nama</th><th>Harga</th><th>Tersedia</th><th>Beli</th></tr>";

        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            // Displaying images from BLOB data
            if ($row["gambar"]) {
                $imageData = base64_encode($row["gambar"]);
                $imageType = 'png'; // Change this based on the actual image type
                echo "<td><img src='data:image/$imageType;base64,$imageData' alt='Image'></td>";
            } else {
                echo "<td>No image</td>";
            }
            echo "<td>" . $row["nama"] . "</td>";
            echo "<td>" . $row["harga"] . "</td>";
            echo "<td>" . $row["tersedia"] . "</td>";
            echo "<td>" . $row["beli"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    // Free result set
    $result->free();
} else {
    echo "Error: " . $conn->error;
}

// Close connection
$conn->close();
?>




</table>

<script>
    function showCreateForm() {
        document.getElementById('createForm').style.display = 'block';
        document.getElementById('readForm').style.display = 'none';
        document.getElementById('updateForm').style.display = 'none';
        document.getElementById('deleteForm').style.display = 'none';
    }

    function showReadForm() {
        document.getElementById('createForm').style.display = 'none';
        document.getElementById('readForm').style.display = 'block';
        document.getElementById('updateForm').style.display = 'none';
        document.getElementById('deleteForm').style.display = 'none';
    }

    function showUpdateForm() {
        document.getElementById('createForm').style.display = 'none';
        document.getElementById('readForm').style.display = 'none';
        document.getElementById('updateForm').style.display = 'block';
        document.getElementById('deleteForm').style.display = 'none';
    }

    function showDeleteForm() {
        document.getElementById('createForm').style.display = 'none';
        document.getElementById('readForm').style.display = 'none';
        document.getElementById('updateForm').style.display = 'none';
        document.getElementById('deleteForm').style.display = 'block';
    }
</script>

</body>
</html>
