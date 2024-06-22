<?php ob_start(); ?>

<style>
    h1 {
        text-align: center;
        color: #333;
    }
    dl {
        width: 50%;
        margin: 20px auto;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
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
    }
    .btn-success:hover {
        background-color: #218838;
    }
</style>

<h1><?= $departemen['nama_departemen']; ?></h1>
<dl>
    <dt>Nama Departemen:</dt>
    <dd><?= $departemen['nama_departemen']; ?></dd>
    <dt>Divisi:</dt>
    <dd><?= $departemen['nama_divisi']; ?></dd>
    <dt>Jabatan:</dt>
    <dd><?= $departemen['jabatan']; ?></dd>
    <dt>Jumlah Karyawan:</dt>
    <dd><?= $departemen['jumlah_karyawan']; ?></dd>
</dl>

<a class="btn btn-success" href="http://localhost/web_cuti/index.php/departemen">KEMBALI</a>

<?php $isi = ob_get_clean(); ?>
<?php include 'view/template.php'; ?>
