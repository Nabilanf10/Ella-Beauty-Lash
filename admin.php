<?php
session_start(); // Start session to access admin data

// Check if admin is logged in (you may have a check for user role here)
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php'); // Redirect to login page if not logged in or not admin
    exit;
}

// Include the database configuration file
include('config.php');

// Fetch all reservasi data with status 'pending'
$sql = "SELECT r.id, r.nomor_hp, r.tanggal_reservasi, r.jam_reservasi, r.perawatan, r.status, r.catatan, u.email, u.name, u.phonenumber 
        FROM reservasi r
        INNER JOIN users u ON r.user_id = u.id
        ORDER BY r.tanggal_reservasi DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$reservasi_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle approval or rejection of reservation
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $reservasi_id = $_GET['id'];

    if ($action == 'acc' || $action == 'tolak') {
        // Update status based on action (approve or reject)
        $update_sql = "UPDATE reservasi SET status = :status WHERE id = :id";
        $update_stmt = $pdo->prepare($update_sql);
        $update_stmt->bindParam(':status', $action, PDO::PARAM_STR);
        $update_stmt->bindParam(':id', $reservasi_id, PDO::PARAM_INT);
        $update_stmt->execute();

        // Redirect back to the page after updating
        header('Location: admin_kelola_reservasi.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Reservasi - Ella Beauty Lash</title>
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
            max-width: 1048px;
            margin: 100px auto;
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

        .action-btn {
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }

        .approve-btn {
            background-color: green;
        }

        .reject-btn {
            background-color: red;
        }

        .action-btn:hover {
            opacity: 0.8;
        }

        /* Media Queries for Responsiveness */
        @media screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                text-align: center;
            }

            .container {
                margin: 100px 20px;
                padding: 15px;
            }

            table {
                font-size: 12px;
            }

            th,
            td {
                padding: 8px;
            }

            .action-btn {
                font-size: 12px;
                padding: 4px 8px;
            }
        }

        @media screen and (max-width: 480px) {
            .navbar {
                font-size: 14px;
            }

            .container {
                padding: 10px;
            }

            table {
                font-size: 10px;
            }

            th,
            td {
                padding: 6px;
            }

            .action-btn {
                font-size: 10px;
                padding: 3px 6px;
            }
        }

        #title {
            display: block;
        }

        @media (max-width: 768px) {
            #title {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div>
        <ul style="display: flex; justify-content: space-between; align-items: center;">
            <div style="flex-shrink: 0;">
                <h2 class="b" id="title">Ella Beauty Lash</h2>
            </div>
            <?php include('header_admin.php'); ?>
        </ul>
    </div>

    <!-- Admin Kelola Reservasi -->
    <div class="container">
        <h1>Kelola Reservasi</h1>

        <!-- Table displaying reservations -->
        <?php if (count($reservasi_list) > 0): ?>
            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Tanggal Reservasi</th>
                            <th>Jam Reservasi</th>
                            <th>Perawatan</th>
                            <th>Status</th>
                            <th>Catatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservasi_list as $index => $reservasi): ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo $reservasi['name']; ?></td>
                                <td><?php echo $reservasi['email']; ?></td>
                                <td><?php echo $reservasi['phonenumber']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($reservasi['tanggal_reservasi'])); ?></td>
                                <td><?php echo date('H:i', strtotime($reservasi['jam_reservasi'])); ?></td>
                                <td><?php echo ucfirst(str_replace('_', ' ', $reservasi['perawatan'])); ?></td>
                                <td class="<?php echo 'status-' . strtolower($reservasi['status']); ?>">
                                    <?php echo ucfirst($reservasi['status']); ?>
                                </td>
                                <td><?php echo $reservasi['catatan']; ?></td>
                                <td style="display:flex; gap:5px;">
                                    <?php if ($reservasi['status'] == 'pending'): ?>
                                        <a href="admin_kelola_reservasi.php?action=acc&id=<?php echo $reservasi['id']; ?>"
                                            class="action-btn approve-btn">Setujui</a>
                                        <a href="admin_kelola_reservasi.php?action=tolak&id=<?php echo $reservasi['id']; ?>"
                                            class="action-btn reject-btn">Tolak</a>
                                    <?php else: ?>
                                        <span>-</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>Belum ada reservasi yang perlu dikelola.</p>
        <?php endif; ?>
    </div>
</body>

</html>