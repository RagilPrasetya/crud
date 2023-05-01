<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $foto=$_FILES['foto'];
    $nama=$_POST['nama'];
    $sekolah=$_POST['sekolah'];
    $alamat=$_POST['alamat'];
    
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE users SET foto='$foto',nama='$nama',sekolah='$sekolah',alamat='$alamat' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $foto = $user_data['foto'];
    $nama = $user_data['nama'];
    $sekolah = $user_data['sekolah'];
    $alamat = $user_data['alamat'];
}
?>
<html>
<head>	
    <title>Edit data siswa</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Foto</td>
                <td><input type="file" name="foto" value=<?php echo $foto;?>></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Sekolah</td>
                <td><input type="text" name="sekolah" value=<?php echo $sekolah;?>></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>