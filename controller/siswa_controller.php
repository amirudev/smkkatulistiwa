<?php
global $conn;
require "../connection.php";

// CRUD Siswa
// Create, Read, Update, Delete

// Create
if (isset($_POST['create'])) {
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO murid (nis, nama_siswa, jk, alamat) VALUES ('$nis', '$nama_siswa', '$jk', '$alamat')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["message"] = "<div class='alert alert-success'>Data Siswa ($nama_siswa) berhasil ditambahkan</div>";

        header('Location: ../view/siswa.php');
    } else {
        echo "Gagal menambahkan data";
    }
}

// Read
function readSiswa()
{
    global $conn;
    $query = "SELECT * FROM murid";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Update
if (isset($_POST['update'])) {
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE murid SET nama_siswa = '$nama_siswa', jk = '$jk', alamat = '$alamat' WHERE nis = '$nis'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["message"] = "<div class='alert alert-success'>Data Siswa ($nama_siswa) berhasil ditambahkan</div>";

        header('Location: ../view/siswa.php');
    } else {
        echo "Gagal mengubah data";
    }
}

// Delete
if (isset($_GET['delete'])) {
    $nis = $_GET['delete'];
    $query = "DELETE FROM murid WHERE nis = '$nis'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["message"] = "<div class='alert alert-success'>Data Guru berhasil dihapus</div>";

        header('Location: ../view/siswa.php');
    } else {
        echo "Gagal menghapus data";
    }
}