<?php ob_start(); ?>
<div class="container">
    <h1>Daftar Departemen</h1>
    <a class="btn btn-success" href="http://localhost/web_cuti/index.php/departemen/create">Tambah Departemen</a>
    <table class="table table-bordered">
        <tr>
            <th>Nama Departemen</th>
            <th>Jumlah Karyawan</th>
            <th>Detail</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($departemen as $row): ?>
            <tr>
                <td><?= $row['nama_departemen']; ?></td>
                <td><?= $row['jumlah_karyawan']; ?></td>
                <td><a class="btn btn-primary" href="http://localhost/web_cuti/index.php/departemen/detail?id=<?= $row['kode']; ?>">LIHAT</a></td>
                <td><a class="btn btn-warning" href="http://localhost/web_cuti/index.php/departemen/edit?id=<?= $row['kode']; ?>">UBAH</a></td>
                <td><a class="btn btn-danger delete-button" href="http://localhost/web_cuti/index.php/departemen/delete?id=<?= $row['kode']; ?>">HAPUS</a></td>
            </tr>  
        <?php endforeach; ?> 
    </table>
</div>
<?php $isi = ob_get_clean(); ?>
<?php include 'view/template.php'; ?>

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
