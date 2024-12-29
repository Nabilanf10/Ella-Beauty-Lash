<?php
session_start(); // Start session to access user data

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Berhasil - Ella Beauty Lash</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f5e6f1;
            color: #333;
        }

        .navbar {
            background-color: #cc50a7;
            padding: 10px 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }


        ul {
            list-style-type: none;
            margin: 0;
            padding: -5px;
            overflow: hidden;
            border: 1px solid #ec57cc;
            background-color: #cc50a7;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: #ffffff;
            text-align: center;
            margin: 14px 16px;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 70px;
        }

        li a:hover:not(.active) {
            background-color: #eecce5;
            border-radius: 70px;
            color: black;
        }

        li a.active {
            color: rgb(0, 0, 0);
            background-color: #eecce5;
        }

        .container {
            max-width: 600px;
            margin: 100px auto 50px;
            /* Adjust for navbar */
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #cc50a7;
        }

        .success-message {
            font-size: 1.2rem;
            margin: 20px 0;
        }

        a {
            color: #cc50a7;
            font-weight: bold;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        button {
            background-color: #cc50a7;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 20px;
        }

        button:hover {
            background-color: #b276a3;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div>
        <ul style="display: flex; justify-content: space-between; align-items: center;">
            <div style="flex-shrink: 0;">
                <h2 class="b">Ella Beauty Lash</h2>
            </div>
            <?php include('header.php'); ?>
        </ul>
    </div>

    <!-- Success Message -->
    <div class="container">
        <h1>Reservasi Berhasil!</h1>
        <p class="success-message">Terima kasih telah melakukan reservasi di Ella Beauty Lash. Kami akan segera mengonfirmasi reservasi Anda.</p>
        <p>Anda dapat melihat detail reservasi Anda pada <a href="profile.php">halaman profil Anda</a>.</p>
        <a href="index.php"><button>Kembali ke Beranda</button></a>
    </div>
</body>

</html>