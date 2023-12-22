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

// Query untuk menghapus data guru berdasarkan ID
$sqlDeleteguru = "DELETE FROM guru WHERE id_guru = $id_guru";

if ($conn->query($sqlDeleteguru) === TRUE) {
    echo "Data guru berhasil dihapus.";
} else {
    echo "Error: " . $sqlDeleteguru . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>