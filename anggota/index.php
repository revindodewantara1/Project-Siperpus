<?php
include '../koneksi.php';

$sql = "SELECT * FROM anggota ORDER BY nama";

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
            <h2 class="card-title"><i class="fas fa-edit"></i>Data anggoata</h2>
        </div>
        <a href="tambah.php"><button type="button" class="btn btn-info mt-3">TAMBAH DATA ANGGOATA</button></a>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pinjam as $p) { ?>
                        <tr>
                            <th scope="row"><?= $no ?></td>
                            <td><?= $p['nama'] ?></th>
                            <td><?= $p['kelas'] ?></td>
                            <td>
                                <a href="detail.php?id=<?= $p["id_anggota"]; ?>" class="badge badge-success">Detail</a>
                                <a href="edit.php?id=<?= $p["id_anggota"]; ?>" class="badge badge-warning">Edit</a>
                                <a href="hapus.php?id=<?= $p["id_anggota"]; ?>" class="badge badge-danger">Hapus</a>
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