<?php
$request = isset($_SERVER['PATH_INFO']) ? preg_replace("|/*(.+?)/*$|", "\\1", $_SERVER['PATH_INFO']) : '';
$uri = explode('/', $request);

$form_action = "http://localhost/web_cuti/index.php/pengajuan/create";
$valNik = isset($pengajuan['nik']) ? $pengajuan['nik'] : '';
$valNama = isset($pengajuan['nama']) ? $pengajuan['nama'] : '';
$valDepartemen = isset($pengajuan['departemen']) ? $pengajuan['departemen'] : '';
$valTanggal_mulai = isset($pengajuan['tgl_mulai']) ? $pengajuan['tgl_mulai'] : '';
$valTanggal_selesai = isset($pengajuan['tgl_selesai']) ? $pengajuan['tgl_selesai'] : '';
$valJenis_cuti = isset($pengajuan['jenis_cuti']) ? $pengajuan['jenis_cuti'] : '';
$valAlasan = isset($pengajuan['alasan']) ? $pengajuan['alasan'] : '';
$valTanggal_Mengajukan = isset($pengajuan['tgl_mengajukan']) ? $pengajuan['tgl_mengajukan'] : '';
$valID = isset($pengajuan['id']) ? $pengajuan['id'] : '';
?>

<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Cuti</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"],
        input[type="date"],
        textarea,
        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: orange;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #ff8c00;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style="text-align: center;">Form Pengajuan Cuti</h2>
        <form action="<?= $form_action ?>" method="post" id="pengajuanForm">
            <?php if ($valID): ?>
                <input type="hidden" name="id" value="<?= $valID ?>">
            <?php endif ?>
            <div class="form-group">
                <label for="idp">ID Pengajuan</label>
                <input type="text" name="idp" value="<?= $valID ?>" id="idp" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nik">Nik</label>
                <input type="text" name="nik" value="<?= $valNik ?>" id="nik" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" value="<?= $valNama ?>" id="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="departemen">Departemen</label>
                <input type="text" name="departemen" value="<?= $valDepartemen ?>" id="departemen" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tgl_mulai">Tanggal Mulai</label>
                <input type="date" name="tgl_mulai" value="<?= $valTanggal_mulai ?>" id="tgl_mulai" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tgl_selesai">Tanggal Selesai</label>
                <input type="date" name="tgl_selesai" value="<?= $valTanggal_selesai ?>" id="tgl_selesai" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jenis_cuti">Jenis Cuti</label>
                <input type="text" name="jenis_cuti" value="<?= $valJenis_cuti ?>" id="jenis_cuti" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alasan">Alasan</label>
                <textarea name="alasan" id="alasan" class="form-control" required><?= $valAlasan ?></textarea>
            </div>
            <div class="form-group">
                <label for="tgl_mengajukan">Tanggal Mengajukan</label>
                <input type="date" name="tgl_mengajukan" value="<?= $valTanggal_Mengajukan ?>" id="tgl_mengajukan" class="form-control" required>
            </div>
            <button type="submit">KIRIM</button>
        </form>
    </div>

    <script>
        // JavaScript to show confirmation and redirect after form submission
        document.getElementById("pengajuanForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission

            // Submit form via AJAX or regular form submission
            var form = this;
            var formData = new FormData(form);

            fetch(form.action, {
                method: form.method,
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Show confirmation alert
                alert("Pengajuan cuti berhasil dikirim!");

                // Reset form fields
                form.reset();
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Terjadi kesalahan saat mengirim pengajuan cuti.");
            });
        });
    </script>

</body>
</html>
<?php $isi = ob_get_clean() ?>
<?php include "view/template.php" ?>
