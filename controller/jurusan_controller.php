<?php
global $conn;
require "../connection.php";

// CRUD Jurusan
// Create, Read, Update, Delete

// Create
if (isset($_POST['create'])) {
    $id_jurusan = $_POST['id_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];

    $query = "INSERT INTO jurusan (id_jurusan, nama_jurusan) VALUES ('$id_jurusan', '$nama_jurusan')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["message"] = "<div class='alert alert-success'>Data Jurusan ($nama_jurusan) berhasil ditambahkan</div>";

        header('Location: ../view/jurusan.php');
    } else {
        echo "Gagal menambahkan data";
    }
}

// Read
function readSiswa()
{
    global $conn;
    $query = "SELECT * FROM jurusan";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Update
if (isset($_POST['update'])) {
    $id_jurusan = $_POST['id_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];

    $query = "UPDATE jurusan SET nama_jurusan = '$nama_jurusan' WHERE id_jurusan = '$id_jurusan'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["message"] = "<div class='alert alert-success'>Data Jurusan ($nama_jurusan) berhasil diubah</div>";

        header('Location: ../view/jurusan.php');
    } else {
        echo "Gagal mengubah data";
    }
}

// Delete
if (isset($_GET['delete'])) {
    $id_jurusan = $_GET['delete'];
    $query = "DELETE FROM jurusan WHERE id_jurusan = '$id_jurusan'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["message"] = "<div class='alert alert-success'>Data Jurusan berhasil dihapus</div>";

        header('Location: ../view/jurusan.php');
    } else {
        echo "Gagal menghapus data";
    }
}