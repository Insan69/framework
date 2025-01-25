<?php
// auth/processRegister.php
session_start(); // Mulai session
require_once '../config/database.php'; // Sertakan file koneksi database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']);

    // Validasi input
    if (empty($username) || empty($password) || empty($email)) {
        $_SESSION['error'] = "Semua field harus diisi!";
        header('Location: ../register.php'); // Redirect kembali ke halaman registrasi
        exit;
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Simpan data ke database
    try {
        $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
        header('Location: ../login.php'); // Redirect ke halaman login
        exit;
    } catch (PDOException $e) {
        $_SESSION['error'] = "Registrasi gagal: " . $e->getMessage();
        header('Location: ../register.php'); // Redirect kembali ke halaman registrasi
        exit;
    }
} else {
    header('Location: ../register.php'); // Redirect jika bukan metode POST
    exit;
}
?>