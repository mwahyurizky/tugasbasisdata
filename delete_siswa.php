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

// Query untuk menghapus data siswa berdasarkan ID
$sqlDeleteSiswa = "DELETE FROM siswa WHERE id_siswa = $id_siswa";

if ($conn->query($sqlDeleteSiswa) === TRUE) {
    echo "Data siswa berhasil dihapus.";
} else {
    echo "Error: " . $sqlDeleteSiswa . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>