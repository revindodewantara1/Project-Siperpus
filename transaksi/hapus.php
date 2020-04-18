<?php
include '../koneksi.php';
$id = $_GET["id_pinjam"];
$query = mysqli_query($kon, "DELETE FROM detail_pinjam where id_pinjam='$id'");
$query_ = mysqli_query($kon, "DELETE FROM peminjaman where id_pinjam='$id'");
if ($query && $query_) {
    header("Location : index.php");
    exit;
} else {
    header("Location : index.php");
    exit;
}
