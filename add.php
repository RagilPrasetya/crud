<html>
<head>
    <title>Tambah Data</title>
</head>
 
<body>
    <a href="index.php">Balik ke awal</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Sekolah</td>
                <td><input type="text" name="sekolah"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr> 
                <td>Foto</td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $foto = $_FILES['foto'];
        $nama = $_POST['nama'];
        $sekolah = $_POST['sekolah'];
        $alamat = $_POST['alamat'];

        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO users(nama,sekolah,alamat,foto) VALUES('$nama','$sekolah','$alamat','$foto')");
        
        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>