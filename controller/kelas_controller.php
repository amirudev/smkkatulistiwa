<?php
global $conn;
require "../connection.php";

// CRUD Kelas
// Create, Read, Update, Delete

// Create
if (isset($_POST['create'])) {
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];

    $query = "INSERT INTO kelas (id_kelas, nama_kelas) VALUES ('$id_kelas', '$nama_kelas')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["message"] = "<div class='alert alert-success'>Data Kelas ($nama_kelas) berhasil ditambahkan</div>";

        header('Location: ../view/kelas.php');
    } else {
        echo "Gagal menambahkan data";
    }
}

// Read
function readSiswa()
{
    global $conn;
    $query = "SELECT * FROM kelas";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Update
if (isset($_POST['update'])) {
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];

    $query = "UPDATE kelas SET nama_kelas = '$nama_kelas' WHERE id_kelas = '$id_kelas'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["message"] = "<div class='alert alert-success'>Data Kelas ($nama_kelas) berhasil diubah</div>";

        header('Location: ../view/kelas.php');
    } else {
        echo "Gagal mengubah data";
    }
}

// Delete
if (isset($_GET['delete'])) {
    $id_kelas = $_GET['delete'];
    $query = "DELETE FROM kelas WHERE id_kelas = '$id_kelas'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["message"] = "<div class='alert alert-success'>Data Kelas berhasil dihapus</div>";

        header('Location: ../view/kelas.php');
    } else {
        echo "Gagal menghapus data";
    }
}