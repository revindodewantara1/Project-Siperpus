<?php
include '../koneksi.php';

$sql = "SELECT * FROM buku INNER JOIN kategori USING(id_kategori) ORDER BY judul";

$res = mysqli_query($kon, $sql);

$pinjam = array();


while ($data = mysqli_fetch_assoc($res)) {
    $pinjam[] = $data;
}

include '../aset/header.php';
?>
<center>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title"><i class="fas fa-edit"></i>Data buku</h2>
        </div>
        <a href="tambah.php"><button type="button" class="btn btn-info mt-3">TAMBAH DATA BUKU</button></a>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">pengarang</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pinjam as $p) { ?>
                        <tr>
                            <th scope="row"><?= $no ?></td>
                            <td><?= $p['judul'] ?></th>
                            <td><?= $p['pengarang'] ?></td>
                            <td><?= $p['stok'] ?></td>
                            <td>
                                <a href="detail.php?id=<?= $p['id_buku']; ?>" class="badge badge-success">Detail</a>
                                <a href="edit.php?id=<?= $p['id_buku']; ?>" class="badge badge-warning">Edit</a>
                                <a href="hapus.php?id=<?= $p['id_buku']; ?>" class="badge badge-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</center>
<?php
include '../aset/footer.php';
?>