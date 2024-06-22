
<?php
$judul = $karyawan['nama'];
?>

<?php ob_start() ?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    h1 {
        text-align: center;
        color: #333;
        margin-top: 20px;
    }
    dl {
        width: 50%;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    dt {
        font-weight: bold;
        margin-top: 10px;
        color: #555;
    }
    dd {
        margin: 0 0 10px 20px;
        color: #777;
    }
    .btn-success {
        display: block;
        width: 100px;
        margin: 20px auto;
        padding: 10px;
        text-align: center;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .btn-success:hover {
        background-color: #218838;
    }
    .btn-primary {
        display: block;
        width: 100px;
        margin: 10px auto;
        padding: 10px;
        text-align: center;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<h1><?= $karyawan['nama']; ?></h1>
<dl>
    <dt>NIK :<?= $karyawan['nik']; ?></dt>
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
