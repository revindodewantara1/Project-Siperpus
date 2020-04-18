<?php
include '../koneksi.php';

function upload($namacover)
{
    $namafile = $_FILES['cover']['name'];
    $error = $_FILES['cover']['error'];
    $tmpname = $_FILES['cover']['tmp_name'];

    if ($error === 4) {
        echo "<script>
    alert('PILIH GAMBAR DAHULU');
    </script>";
        return false;
    }

    $ekstensifilevalid = ['jpg', 'jpeg', 'png'];
    $ekstensifile = strtolower(end(explode('.', $namafile)));

    if (!in_array($ekstensifile, $ekstensifilevalid)) {
        echo "<script>
    alert('YANG ANDA UPLOAD BUKAN GAMBAR');
    </script>";
        return false;
    }

    $namacover .= '.' . $ekstensifile;
    move_uploaded_file($tmpname, 'img/' . $namacover);

    return $namacover;
}

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $ringkasan = $_POST['ringkasan'];
    $stok = $_POST['stok'];
    $id_kategori = $_POST['kategori'];
    $namacover = implode('_', explode(' ', $judul . ' ' . $penerbit . ' ' . $pengarang));
    $cover = upload($namacover);

    if ($cover) {
        $sql = "INSERT INTO buku (judul, penerbit, pengarang, ringkasan, cover, stok, id_kategori) VALUES ( '$judul', '$penerbit', '$pengarang', '$ringkasan', '$cover', '$stok', '$id_kategori')";

        $res = mysqli_query($kon, $sql);
    }
    if ($res) {
        echo "<script>
        alert('BUKU BERHASIL DITAMBAH');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('BUKU GAGAL DITAMBAH');
        document.location.href = 'tambah.php';
        </script>";
    }
} else {
    header("Location: tambah.php");
}
