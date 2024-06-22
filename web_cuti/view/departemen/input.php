<?php
$request = isset($_SERVER['PATH_INFO']) ? preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']) : '';
$uri = explode('/', $request);

if ($uri[1] == 'edit' && isset($_GET['id'])) {
    $judul = "Edit Departemen";
    $form_action = "http://localhost/web_cuti/index.php/departemen/edit?id=" . $_GET['id'];
} else {
    $judul = "Tambah Departemen";
    $form_action = "http://localhost/web_cuti/index.php/departemen/create";
}

$valKode = isset($departemen['kode']) ? $departemen['kode'] : '';
$valNama_departemen = isset($departemen['nama_departemen']) ? $departemen['nama_departemen'] : '';
$valNama_divisi = isset($departemen['nama_divisi']) ? $departemen['nama_divisi'] : '';
$valJabatan = isset($departemen['jabatan']) ? $departemen['jabatan'] : '';
$valJumlahKaryawan = isset($departemen['jumlah_karyawan']) ? $departemen['jumlah_karyawan'] : '';

?>

<h1><?= $judul ?></h1>

<form action="<?= $form_action ?>" method="post">
    <?php if ($valKode): ?>
        <input type="hidden" name="id" value="<?= $valKode ?>">
    <?php endif; ?>
    <div class="form-group">
        <label for="nama_departemen">Nama Departemen</label>
        <input type="text" name="nama_departemen" value="<?= $valNama_departemen ?>" id="nama_departemen" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nama_divisi">Divisi</label>
        <input type="text" name="nama_divisi" value="<?= $valNama_divisi ?>" id="nama_divisi" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <input type="text" name="jabatan" value="<?= $valJabatan ?>" id="jabatan" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="jumlah_karyawan">Jumlah Karyawan</label>
        <input type="number" name="jumlah_karyawan" value="<?= $valJumlahKaryawan ?>" id="jumlah_karyawan" class="form-control" required>
    </div>
    <br>
    <a class="btn btn-success" href="http://localhost/web_cuti/index.php/departemen">KEMBALI</a>
    <button class="btn btn-primary" type="submit">SIMPAN</button>
</form>
<?php $isi = ob_get_clean(); ?>
<?php include 'view/template.php'; ?>