<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian Provinsi</title>
    <style>
        body{
            background-color: #CDE8E5;
        }
        .container{
            /* border: 10px solid; */
            padding: 20px;
            width: fit-content;
            margin: auto;
            margin-top: 5%;
            background-color: #EEF7FF;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Form Input Nama Provinsi</h2>
    <form action="hasil.php" method="POST">
        <label for="nama_provinsi">Masukkan Nama Provinsi, ID kemendagri, atau Ibukota Provinsi:</label><br>
        <input type="text" id="nama_provinsi" name="nama_provinsi"><br><br>
        <button  type="submit">Cari</button>
    </form>

    <h2>Hasil Pencarian Provinsi</h2>
    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get nama provinsi from form
        $id = $_POST['nama_provinsi'];
        $nama_provinsi = $_POST['nama_provinsi'];
        $ibukota_provinsi = $_POST['nama_provinsi'];

        
        
        

        
        // Connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "provinsi";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        
        // Query database to get id and ibukota provinsi
        $sql = "SELECT id,nama_prov, ibukota_prov FROM provinsi 
        WHERE ibukota_prov = '$nama_provinsi'or id = '$id' or ibukota_prov = '$ibukota_provinsi'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo 
                $row["nama_prov"].
                " Memilik ID Kemendagri  " . $row["id"]. 
                ", dengan Ibukota Provinsi berada di  " . $row["ibukota_prov"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        
        $conn->close();
    }
    
   
    ?>
    </div>
</body>
</html>