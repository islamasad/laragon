<?php
// Informasi koneksi ke database
$host = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$database = "uap_9154"; 

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

?>
