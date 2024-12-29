<?php
session_start(); // Start session to access user data

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

// Include the database configuration file
include('config.php');

// Get user_id from session
$user_id = $_SESSION['user_id'];

// Prepare and execute the query to fetch user's reservation history
$sql = "SELECT * FROM reservasi WHERE user_id = :user_id ORDER BY tanggal_reservasi DESC";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$reservasi_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Reservasi - Ella Beauty Lash</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
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

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #cc50a7;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #cc50a7;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        a {
            color: #cc50a7;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .status-pending {
            color: orange;
            font-weight: bold;
        }

        .status-acc {
            color: green;
            font-weight: bold;
        }

        .status-rejected {
            color: red;
            font-weight: bold;
        }

        ul {
            list-style: none;
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
    <!-- Riwayat Reservasi -->
    <div class="container">
        <h1>Riwayat Reservasi Anda</h1>

        <!-- Table displaying reservation history -->
        <?php if (count($reservasi_list) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Reservasi</th>
                        <th>Jam Reservasi</th>
                        <th>Perawatan</th>
                        <th>Status</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservasi_list as $index => $reservasi): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($reservasi['tanggal_reservasi'])); ?></td>
                            <td><?php echo date('H:i', strtotime($reservasi['jam_reservasi'])); ?></td>
                            <td><?php echo ucfirst(str_replace('_', ' ', $reservasi['perawatan'])); ?></td>
                            <td class="<?php echo 'status-' . strtolower($reservasi['status']); ?>">
                                <?php echo ucfirst($reservasi['status']); ?>
                            </td>
                            <td><?php echo $reservasi['catatan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Belum ada riwayat reservasi.</p>
        <?php endif; ?>
    </div>
</body>

</html>