<?php
include '../koneksi.php';
include '../aset/header.php';

$id = $_GET['id'];

$result = mysqli_query($kon, "SELECT * FROM anggota INNER JOIN level USING(id_level)  WHERE id_anggota = $id");
$anggota = mysqli_fetch_assoc($result);

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
                <td rowspan="7" style="width: 350px"><img src="img/1.jpg" alt="" width="300px"></td>
                <td>ID anggota</td>
                <td>:</td>
                <td><?= $anggota['id_anggota']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $anggota['nama']; ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?= $anggota['kelas']; ?></td>
            </tr>
            <tr>
                <td>NO. Telp</td>
                <td>:</td>
                <td><?= $anggota['telp']; ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><?= $anggota['username']; ?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><?= $anggota['password']; ?></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>:</td>
                <td><?= $anggota['level']; ?></td>
            </tr>
        </table>
    </div>
</body>

</html>
<?php
include '../aset/footer.php';
?>