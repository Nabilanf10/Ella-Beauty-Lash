<?php
// Konfigurasi database
define('DB_HOST', 'localhost'); // Host database
define('DB_NAME', 'data_ella'); // Nama database
define('DB_USER', 'root'); // Nama pengguna database
define('DB_PASS', ''); // ganti ke kosong biasanya untuk default

try {
    // Membuat koneksi PDO
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
