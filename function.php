<?php

include_once 'config.php';

// Fungsi untuk registrasi
function register($pdo, $email, $name, $phonenumber, $password, $gender)
{
    // Hash password untuk keamanan
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Menyimpan data ke dalam tabel users
        $sql = "INSERT INTO users (email, name, phonenumber, password, gender) 
                VALUES (:email, :name, :phonenumber, :password, :gender)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':name' => $name,
            ':phonenumber' => $phonenumber,
            ':password' => $hashedPassword,
            ':gender' => $gender
        ]);
        return "Registration successful!";
    } catch (PDOException $e) {
        return "Error during registration: " . $e->getMessage();
    }
}

// Fungsi untuk login
function login($pdo, $email, $password)
{
    try {
        // Mencari user berdasarkan email
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Login berhasil
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            return "Login successful!";
        } else {
            // Login gagal
            return "Invalid email or password!";
        }
    } catch (PDOException $e) {
        return "Error during login: " . $e->getMessage();
    }
}

// Menangani permintaan POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        if ($_POST['submit'] == 'Sign In') {
            // Login
            $email = $_POST['email'];
            $password = $_POST['password'];
            $message = login($pdo, $email, $password);



            if ($message == "Login successful!") {
                $role =  $_SESSION['role'];

                echo "<script>
                    alert('" . addslashes($message) . "');
                    // Mengecek jika role admin, arahkan ke halaman admin
                    if ('" . $_SESSION['role'] . "' == 'admin') {
                        window.location.href = 'admin.php';
                    } else {
                        window.location.href = 'index.php';
                    }
                </script>";
            } else {
                echo "<script>
                    alert('" . addslashes($message) . "');
                    window.location.href = 'login.php';
                </script>";
            }
        } elseif ($_POST['submit'] == 'Register') {
            // Register
            $email = $_POST['email'];
            $name = $_POST['name'];
            $phonenumber = $_POST['phonenumber'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $message = register($pdo, $email, $name, $phonenumber, $password, $gender);
            echo "<script>
                alert('" . addslashes($message) . "');
                window.location.href = 'register.php';
            </script>";
        }
    }
}
