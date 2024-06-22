<!-- file : oopmvc/view/karyawan/detail.php -->
<?php
$judul = $karyawan['nama'];
?>

<?php ob_start() ?>
<h1><?= $karyawan['nama']; ?></h1>
<dl>
    <dt>NIK :</dt>
    <dd><?= $karyawan['nik']; ?></dd>
    <dt>Nama :</dt>
    <dd><?= $karyawan['nama']; ?></dd>
    <dt>Tanggal Lahir :</dt>
    <dd><?= $karyawan['tanggal_lahir']; ?></dd>
    <dt>Jenis Kelamin :</dt>
    <dd><?= $karyawan['jenis_kelamin']; ?></dd>
    <dt>Departemen :</dt>
    <dd><?= $karyawan['departemen']; ?></dd>
    <dt>Alamat :</dt>
    <dd><?= $karyawan['alamat']; ?></dd>
    <dt>No. HP :</dt>
    <dd><?= $karyawan['no_hp']; ?></dd>
    <dt>Tanggal Masuk :</dt>
    <dd><?= $karyawan['tgl_masuk']; ?></dd>
</dl>

<a class="btn btn-success" href="http://localhost/web_cuti/index.php/karyawan">KEMBALI</a>
<?php $isi = ob_get_clean(); ?>
<?php include "view/template.php"; ?>
