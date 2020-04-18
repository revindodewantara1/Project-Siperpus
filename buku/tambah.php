<?php
include '../koneksi.php';
include '../aset/header.php';

$kategori = mysqli_query($kon, "SELECT * FROM kategori");

?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah Data Buku</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="proses-tambah.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="judul">Judul Buku</label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul buku">
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Masukkan penerbit">
                           
                        </div>
                        <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Masukkan nama pengarang">
              
                        </div>
                        <div class="form-group">
                            <label for="ringkasan">Ringkasan</label>
                            <textarea name="ringkasan" id="ringkasan" cols="30" rows="5" placeholder="masukkan ringkasan buku" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="cover">cover</label>
                            <input type="file" class="form-control" name="cover" id="cover" placeholder="Masukkan cover buku">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" name="stok" id="stok" placeholder="Masukkan stok buku">
                        </div>
                        <div class="form-group">
                            <label for="kategori">ID Kategori</label>
                            <select name="kategori" id="kategori" style="width: 100%" required>
                                <option value="">-- PILIH KATEGORI BUKU --</option>
                                <?php while ($k = mysqli_fetch_assoc($kategori)) : ?>
                                    <option value="<?= $k["id_kategori"]; ?>"><?= $k["kategori"]; ?></option>
                                <?php endwhile; ?>
                            </select>
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