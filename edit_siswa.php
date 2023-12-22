<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
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

// Mengambil ID Siswa dari parameter URL
$id_siswa = $_GET["id"];

// Query untuk mengambil data siswa berdasarkan ID
$sqlSiswa = "SELECT * FROM siswa WHERE id_siswa = $id_siswa";
$resultSiswa = $conn->query($sqlSiswa);

// Menampilkan formulir edit data siswa
if ($resultSiswa->num_rows > 0) {
    $rowSiswa = $resultSiswa->fetch_assoc();
    ?>
    <h2>Edit Data Siswa</h2>
    <form action="process_edit_siswa.php" method="POST">
        <input type="hidden" name="id_siswa" value="<?php echo $rowSiswa['id_siswa']; ?>">
        Nama Siswa: <input type="text" name="nama_siswa" value="<?php echo $rowSiswa['nama_siswa']; ?>" required><br>
        Kelas: <input type="text" name="kelas" value="<?php echo $rowSiswa['kelas']; ?>" required><br>
        Jurusan: <input type="text" name="jurusan" value="<?php echo $rowSiswa['jurusan']; ?>" required><br>
        Alamat: <input type="text" name="alamat" value="<?php echo $rowSiswa['alamat']; ?>" required><br>
        No. HP: <input type="text" name="no_hp" value="<?php echo $rowSiswa['no_hp']; ?>" required><br>
        <input type="submit" value="Simpan Perubahan">
    </form>
    <?php
} else {
    echo "Data siswa tidak ditemukan.";
}

// Menutup koneksi
$conn->close();
?>

</body>
</html>