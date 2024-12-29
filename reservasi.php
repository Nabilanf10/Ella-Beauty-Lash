<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi - Ella Beauty Lash</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f5e6f1;
            color: #333;
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
            margin: 80px auto 50px;
            /* Adjust for navbar */
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #cc50a7;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input,
        select,
        textarea,
        button {
            font-size: 1rem;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: none;
        }

        button {
            background-color: #cc50a7;
            color: white;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #b276a3;
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

    <!-- Reservasi Form -->
    <div class="container">
        <h1>Reservasi</h1>
        <form action="reservasiPost.php" method="POST">
            <!-- Nomor HP -->
            <label for="nomor_hp">Nomor HP:</label>
            <input type="tel" id="nomor_hp" name="nomor_hp" placeholder="Masukkan nomor HP Anda" required>

            <!-- Tanggal Reservasi -->
            <label for="tanggal_reservasi">Tanggal Reservasi:</label>
            <input type="date" id="tanggal_reservasi" name="tanggal_reservasi" required>

            <!-- Jam Reservasi -->
            <label for="jam_reservasi">Jam Reservasi:</label>
            <input type="time" id="jam_reservasi" name="jam_reservasi" required>

            <!-- Perawatan -->
            <label for="perawatan">Pilih Perawatan:</label>
            <select id="perawatan" name="perawatan" required>
                <option value="" disabled selected>Pilih perawatan</option>
                <option value="nail_price">Nail Price</option>
                <option value="eyelash">Eyelash</option>
            </select>

            <!-- Catatan -->
            <label for="catatan">Catatan:</label>
            <textarea id="catatan" name="catatan" rows="4" placeholder="Tambahkan catatan khusus jika ada"></textarea>

            <!-- Submit Button -->
            <button type="submit">Kirim Reservasi</button>
        </form>
    </div>
</body>

</html>