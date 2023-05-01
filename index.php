<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>
 
<html>
<head>    
    <title>Data Siswa</title>
    
</head>
 
<body>
    <h1>DATA SISWA</h1>
    <button onclick="window.location.href='add.php'" class="">Tambah data</button><br/><br/>
    <!-- <a href="add.php">Tambah data</a><br/><br/> -->

 
    <table border="1" align="center" width="100%" height="500">
 
    <tr>
        <th>Foto</th>
        <th>Nama</th>
        <th>Sekolah</th> 
        <th>Alamat</th> 
        <th>Aksi</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td><img src='img/".$user_data['foto']."' width='450px' height='450px'></td>";   
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['sekolah']."</td>";
        echo "<td>".$user_data['alamat']."</td>";       
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>

    
</body>
</html>