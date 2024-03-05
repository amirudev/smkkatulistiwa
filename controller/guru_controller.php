<?php
global $conn;
require "../connection.php";

// CRUD Guru
// Create, Read, Update, Delete

// Create
if (isset($_POST['create'])) {
    $id_guru = $_POST['id_guru'];
    $nama_guru = $_POST['nama_guru'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO guru (id_guru, nama_guru, jk, alamat) VALUES ('$id_guru', '$nama_guru', '$jk', '$alamat')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["message"] = "<div class='alert alert-success'>Data Guru ($nama_guru) berhasil ditambahkan</div>";

        header('Location: ../view/guru.php');
    } else {
        echo "Gagal menambahkan data";
    }
}

// Read
function readSiswa()
{
    global $conn;
    $query = "SELECT * FROM guru";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Update
if (isset($_POST['update'])) {
    $id_guru = $_POST['id_guru'];
    $nama_guru = $_POST['nama_guru'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE guru SET nama_guru = '$nama_guru', jk = '$jk', alamat = '$alamat' WHERE id_guru = '$id_guru'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["message"] = "<div class='alert alert-success'>Data Guru ($nama_guru) berhasil diubah</div>";

        header('Location: ../view/guru.php');
    } else {
        echo "Gagal mengubah data";
    }
}

// Delete
if (isset($_GET['delete'])) {
    $id_guru = $_GET['delete'];
    $query = "DELETE FROM guru WHERE id_guru = '$id_guru'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["message"] = "<div class='alert alert-success'>Data Guru berhasil dihapus</div>";

        header('Location: ../view/guru.php');
    } else {
        echo "Gagal menghapus data";
    }
}