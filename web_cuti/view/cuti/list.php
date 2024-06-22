<?php ob_start(); ?>
<div class="container">
    <h1>Daftar Karyawan</h1>
    <a class="btn btn-success" href="http://localhost/web_cuti/index.php/karyawan/create">Tambah Karyawan</a>
    <table class="table table-bordered">
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Departemen</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($karyawan as $k): ?>
            <tr>
                <td><?= $k['nik']; ?></td>
                <td><?= $k['nama']; ?></td>
                <td><?= $k['departemen']; ?></td>
                <td><a class="btn btn-primary" href="http://localhost/web_cuti/index.php/karyawan/detail?id=<?= $k['Id']; ?>">VIEW</a></td>
                <td><a class="btn btn-warning" href="http://localhost/web_cuti/index.php/karyawan/edit?id=<?= $k['Id']; ?>">EDIT</a></td>
                <td><a class="btn btn-danger delete-button" href="http://localhost/web_cuti/index.php/karyawan/delete?id=<?= $k['Id']; ?>">DELETE</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php $isi = ob_get_clean(); ?>
<?php include "view/template.php"; ?>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                var confirmDelete = confirm('Apakah Anda yakin ingin menghapus departemen ini?');
                if (!confirmDelete) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
