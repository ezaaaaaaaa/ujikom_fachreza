<?php
include "koneksi.php";

if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit;
}

if (isset($_GET['id_siswa']) && is_numeric($_GET['id_siswa'])) {
    $id_siswa = $_GET['id_siswa'];

    $stmt = $koneksi->prepare("DELETE FROM siswa WHERE id_siswa = ?");
    $stmt->bind_param("i", $id_siswa);

    if ($stmt->execute()) {
        header("Location: siswa.php");
        exit;
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid or missing student ID.";
}

$koneksi->close();
?>