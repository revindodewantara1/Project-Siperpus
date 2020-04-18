<?php
include '../koneksi.php';

$id = $_GET["id"];

$result = mysqli_query($kon, "DELETE FROM anggota WHERE id_anggota = $id");

if ($result) {
    echo "<script>
    alert('BUKU BERHASIL DIHAPUS');
    document.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
    alert('BUKU GAGAL DIHAPUS');
    document.location.href = 'index.php';
    </script>";
}
