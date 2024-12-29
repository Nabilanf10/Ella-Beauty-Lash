<?php
session_start(); // Start session to access session variables

// Include database connection
include 'config.php'; // File config.php should contain the PDO connection setup

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Check if POST request contains required data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nomor_hp = $_POST['nomor_hp'] ?? '';
    $tanggal_reservasi = $_POST['tanggal_reservasi'] ?? '';
    $jam_reservasi = $_POST['jam_reservasi'] ?? '';
    $perawatan = $_POST['perawatan'] ?? '';
    $catatan = $_POST['catatan'] ?? '';

    try {
        // Prepare SQL query to insert reservation
        $query = "INSERT INTO reservasi (user_id, nomor_hp, tanggal_reservasi, jam_reservasi, perawatan, catatan, status) 
                  VALUES (:user_id, :nomor_hp, :tanggal_reservasi, :jam_reservasi, :perawatan, :catatan, 'pending')";
        $stmt = $pdo->prepare($query);

        // Bind parameters
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':nomor_hp', $nomor_hp, PDO::PARAM_STR);
        $stmt->bindParam(':tanggal_reservasi', $tanggal_reservasi, PDO::PARAM_STR);
        $stmt->bindParam(':jam_reservasi', $jam_reservasi, PDO::PARAM_STR);
        $stmt->bindParam(':perawatan', $perawatan, PDO::PARAM_STR);
        $stmt->bindParam(':catatan', $catatan, PDO::PARAM_STR);

        // Execute query
        $stmt->execute();

        header('Location: reservasi_success.php');
        exit;
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect to the form page if accessed without POST
    header('Location: reservasi.php');
    exit;
}
