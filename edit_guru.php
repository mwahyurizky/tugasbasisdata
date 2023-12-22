<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data guru</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "wahyu_db";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil ID guru dari parameter URL
$id_guru = $_GET["id"];

// Query untuk mengambil data guru berdasarkan ID
$sqlguru = "SELECT * FROM guru WHERE id_guru = $id_guru";
$resultguru = $conn->query($sqlguru);

// Menampilkan formulir edit data guru
if ($resultguru->num_rows > 0) {
    $rowguru = $resultguru->fetch_assoc();
    ?>
    <h2>Edit Data Guru</h2>
    <form action="process_edit_guru.php" method="POST">
        <input type="hidden" name="id_guru" value="<?php echo $rowguru['id_guru']; ?>">
        Nama Guru: <input type="text" name="nama_guru" value="<?php echo $rowguru['nama_guru']; ?>" required><br>
        mapel: <input type="text" name="guru_mapel" value="<?php echo $rowguru['guru_mapel']; ?>" required><br>
        No. HP: <input type="text" name="no_hp" value="<?php echo $rowguru['no_hp']; ?>" required><br>
        Alamat: <input type="text" name="alamat" value="<?php echo $rowguru['alamat']; ?>" required><br>
        
        <input type="submit" value="Simpan Perubahan">
    </form>
    <?php
} else {
    echo "Data guru tidak ditemukan.";
}

// Menutup koneksi
$conn->close();
?>

</body>
</html>