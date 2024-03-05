<?php
global $conn;
require "../connection.php";

// CRUD Mapel
// Create, Read, Update, Delete

// Create
if (isset($_POST['create'])) {
    $id_mapel = $_POST['id_mapel'];
    $nama_mapel = $_POST['nama_mapel'];

    $query = "INSERT INTO mapel (id_mapel, nama_mapel) VALUES ('$id_mapel', '$nama_mapel')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["message"] = "<div class='alert alert-success'>Data Mapel ($nama_mapel) berhasil ditambahkan</div>";

        header('Location: ../view/mapel.php');
    } else {
        echo "Gagal menambahkan data";
    }
}

// Read
function readSiswa()
{
    global $conn;
    $query = "SELECT * FROM mapel";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Update
if (isset($_POST['update'])) {
    $id_mapel = $_POST['id_mapel'];
    $nama_mapel = $_POST['nama_mapel'];

    $query = "UPDATE mapel SET nama_mapel = '$nama_mapel' WHERE id_mapel = '$id_mapel'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["message"] = "<div class='alert alert-success'>Data Mapel ($nama_mapel) berhasil diubah</div>";

        header('Location: ../view/mapel.php');
    } else {
        echo "Gagal mengubah data";
    }
}

// Delete
if (isset($_GET['delete'])) {
    $id_mapel = $_GET['delete'];
    $query = "DELETE FROM mapel WHERE id_mapel = '$id_mapel'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION["message"] = "<div class='alert alert-success'>Data Mapel berhasil dihapus</div>";

        header('Location: ../view/mapel.php');
    } else {
        echo "Gagal menghapus data";
    }
}