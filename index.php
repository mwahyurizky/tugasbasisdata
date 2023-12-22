<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa dan Guru</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
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

// Query untuk mengambil data dari tabel siswa
$sqlSiswa = "SELECT * FROM siswa";
$resultSiswa = $conn->query($sqlSiswa);

// Query untuk mengambil data dari tabel guru
$sqlGuru = "SELECT * FROM guru";
$resultGuru = $conn->query($sqlGuru);
?>

<h2>Data Siswa</h2>

<!-- Tabel Siswa -->
<table>
    <tr>
        <th>ID Siswa</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Alamat</th>
        <th>No. HP</th>
        <th>Aksi</th>
    </tr>
    <?php
    if ($resultSiswa->num_rows > 0) {
        while ($rowSiswa = $resultSiswa->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $rowSiswa["id_siswa"] . "</td>";
            echo "<td>" . $rowSiswa["nama_siswa"] . "</td>";
            echo "<td>" . $rowSiswa["kelas"] . "</td>";
            echo "<td>" . $rowSiswa["jurusan"] . "</td>";
            echo "<td>" . $rowSiswa["alamat"] . "</td>";
            echo "<td>" . $rowSiswa["no_hp"] . "</td>";
            echo "<td><a href='edit_siswa.php?id=" . $rowSiswa["id_siswa"] . "'>Edit</a> | <a href='delete_siswa.php?id=" . $rowSiswa["id_siswa"] . "'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Tidak ada data di tabel siswa.</td></tr>";
    }
    ?>
</table>

<h2>Data Guru</h2>

<!-- Tabel Guru -->
<table>
    <tr>
        <th>ID Guru</th>
        <th>Nama Guru</th>
        <th>Mata Pelajaran</th>
        <th>Alamat</th>
        <th>No. HP</th>
        <th>Aksi</th>
    </tr>
    <?php
    if ($resultGuru->num_rows > 0) {
        while ($rowGuru = $resultGuru->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $rowGuru["id_guru"] . "</td>";
            echo "<td>" . $rowGuru["nama_guru"] . "</td>";
            echo "<td>" . $rowGuru["guru_mapel"] . "</td>";
            echo "<td>" . $rowGuru["alamat"] . "</td>";
            echo "<td>" . $rowGuru["no_hp"] . "</td>";
            echo "<td><a href='edit_guru.php?id=" . $rowGuru["id_guru"] . "'>Edit</a> | <a href='delete_guru.php?id=" . $rowGuru["id_guru"] . "'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada data di tabel guru.</td></tr>";
    }
    ?>
</table>

<h2>Tambah Data Siswa</h2>

<!-- Formulir Tambah Data Siswa -->
<form action="process_add_siswa.php" method="POST">
	Npm : <input type="text" name="id_siswa" required><br>
    Nama Siswa: <input type="text" name="nama_siswa" required><br>
    Kelas: <input type="text" name="kelas" required><br>
    Jurusan: <input type="text" name="jurusan" required><br>
    Alamat: <input type="text" name="alamat" required><br>
    No. HP: <input type="text" name="no_hp" required><br>
    <input type="submit" value="Tambah Data">
</form>

<?php
// Menutup koneksi
$conn->close();
?>

</body>
</html>