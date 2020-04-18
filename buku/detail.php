<?php
include '../koneksi.php';
include '../aset/header.php';

$id = $_GET['id'];

$result = mysqli_query($kon, "SELECT * FROM buku INNER JOIN kategori USING(id_kategori) WHERE buku.id_buku = $id");
$buku = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style></style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php"><button type="button" class="btn btn-primary ml-3 mt-3" style="width: 150px"><i class="fas fa-angle-double-left"></i> Back</button></a>
    <div class="mx-auto shadow-lg p-3 mb-5 bg-white rounded" style="margin-top: 30px; width: 1000px; border-bottom: 5px solid grey">
        <table class="table table-striped">
            <tr>
                <td rowspan="7" style="width: 350px"><img src="img/<?= $buku['cover']; ?>" alt="" width="300px"></td>
                <td>ID BUKU</td>
                <td>:</td>
                <td><?= $buku['id_buku']; ?></td>
            </tr>
            <tr>
                <td>JUDUL</td>
                <td>:</td>
                <td><?= $buku['judul']; ?></td>
            </tr>
            <tr>
                <td>PENERBIT</td>
                <td>:</td>
                <td><?= $buku['penerbit']; ?></td>
            </tr>
            <tr>
                <td>PENGARANG</td>
                <td>:</td>
                <td><?= $buku['pengarang']; ?></td>
            </tr>
            <tr>
                <td>STOK</td>
                <td>:</td>
                <td><?= $buku['stok']; ?></td>
            </tr>
            <tr>
                <td>KATEGORI</td>
                <td>:</td>
                <td><?= $buku['kategori']; ?></td>
            </tr>
            <tr>
                <td>RINGKASAN</td>
                <td>:</td>
                <td><textarea readonly name="" id="" cols="30" rows="3"><?= $buku['ringkasan']; ?></textarea></td>
            </tr>
        </table>
    </div>
</body>

</html>
<?php include '../aset/footer.php'; ?>