<?php
// Periksa apakah PATH_INFO sudah diatur untuk menghindari kesalahan indeks yang tidak terdefinisi
$request = isset($_SERVER['PATH_INFO']) ? preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']) : '';
$uri = explode('/', $request);

if ($uri[1] == 'edit' && isset($_GET['id'])) {
    $judul = "Edit Karyawan";
    $form_action = "http://localhost/web_cuti/index.php/karyawan/edit?id=" . $_GET['id'];
} else {
    $judul = "Tambah Karyawan";
    $form_action = "http://localhost/web_cuti/index.php/karyawan/create";
}


$valNik = isset($karyawan['nik']) ? $karyawan['nik'] : '';
$valNama = isset($karyawan['nama']) ? $karyawan['nama'] : '';
$valTanggal_lahir = isset($karyawan['tanggal_lahir']) ? $karyawan['tanggal_lahir'] : '';
$valJenis_Kelamin = isset($karyawan['jenis_kelamin']) ? $karyawan['jenis_kelamin'] : '';
$valDepartemen = isset($karyawan['departemen']) ? $karyawan['departemen'] : '';
$valAlamat = isset($karyawan['alamat']) ? $karyawan['alamat'] : '';
$valNoHp = isset($karyawan['no_hp']) ? $karyawan['no_hp'] : '';
$valTanggalMasuk = isset($karyawan['tanggal_masuk']) ? $karyawan['tanggal_masuk'] : '';
$valID = isset($karyawan['id']) ? $karyawan['id'] : '';
?>
<h1><?= $judul ?></h1>

<form action="<?= $form_action ?>" method="post">
    <?php if ($valID): ?>
        <input type="hidden" name="id" value="<?= $valID ?>">
    <?php endif ?>
    <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" name="nik" value="<?= $valNik ?>" id="nik" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?= $valNama ?>" id="nama" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="<?= $valTanggal_lahir ?>" id="tanggal_lahir" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <input type="text" name="jenis_kelamin" value="<?= $valJenis_Kelamin ?>" id="jenis_kelamin" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="departemen">Departemen</label>
        <input type="text" name="departemen" value="<?= $valDepartemen ?>" id="departemen" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control" required><?= $valAlamat ?></textarea>
    </div>
    <div class="form-group">
        <label for="no_hp">No. HP</label>
        <input type="text" name="no_hp" value="<?= $valNoHp ?>" id="no_hp" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tgl_masuk">Tanggal Masuk</label>
        <input type="date" name="tgl_masuk" value="<?= $valTanggalMasuk ?>" id="tgl_masuk" class="form-control" required>
    </div>
    <br>
    <a class="btn btn-success" href="http://localhost/web_cuti/index.php/karyawan">KEMBALI</a>
    <button class="btn btn-primary" type="submit">SIMPAN</button>
</form>
</div>
<?php $isi = ob_get_clean() ?>
<?php include "view/template.php" ?>
