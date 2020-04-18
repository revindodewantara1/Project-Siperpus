<?php
include '../koneksi.php';
include '../aset/header.php';

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $update = mysqli_query($kon, "UPDATE anggota SET
    nama = '$nama',
    kelas = '$kelas',
    telp = '$telp',
    username = '$username',
    password = '$password'
    WHERE id_anggota = $id") or die(mysqli_error($kon));

    if ($update) {
        echo "<script>
    alert('ANGGOTA BERHASIL DI EDIT');
    document.location.href = 'index.php';
    </script>";
    } else {
        echo "<script>
    alert('ANGGOTA GAGAL DI EDIT');
    document.location.href = 'index.php';
    </script>";
    }
}
$id = $_GET['id'];

$result = mysqli_query($kon, "SELECT * FROM anggota INNER JOIN level USING(id_level)  WHERE id_anggota = $id");
$anggota = mysqli_fetch_assoc($result);

?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Data Anggota</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <input type="hidden" value="<?= $id; ?>" name="id">
                        <div class="form-group">
                            <label for="anggota">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="anggota" placeholder="Masukkan nama lengkap" value="<?= $anggota['nama']; ?>">
                            <small class="form-text text-muted">Contoh: Raihan Firmansyah</small>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Masukkan kelas" value="<?= $anggota['kelas']; ?>">
                            <small class="form-text text-muted">Contoh: XRPL7</small>
                        </div>
                        <div class="form-group">
                            <label for="telp">Nomor Telepon</label>
                            <input type="text" class="form-control" name="telp" id="telp" placeholder="Masukkan nomor telepon" value="<?= $anggota['telp']; ?>">
                            <small class="form-text text-muted">Contoh: 111-222-3333</small>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" value="<?= $anggota['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" value="<?= $anggota['password']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../aset/footer.php';
?>