<!DOCTYPE html>
<html>
<head>
<title>Data Pengajuan</title>
<style>
    table {
        border-collapse: collapse;
        width: 950px;
        margin: 10px auto;
        align: center;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: orange;
        
    }
    td {
        background-color: rgba(255,255,290);
    }
    .btn-kelola {
        background-color: green;
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn-kelola:hover {
        background-color: #58a20f;
    }
</style>
</head>
<body>
<h2 align="center">Data Pengajuan</h2>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbcutikaryawan";

// Create connection
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
?>

<table border='1'>
    <tr>
        <th>ID Pengajuan</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Departemen</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
        <th>Jenis Cuti</th>
        <th>Alasan</th>
        <th>Aksi</th>
    </tr>

    <?php
    $sql = mysqli_query($koneksi, "SELECT * FROM pengajuan_cuti");
    while($tampil = mysqli_fetch_array($sql)) {
    ?>
    <tr>
        <td><?php echo $tampil['id_pengajuan']; ?></td>
        <td><?php echo $tampil['nik']; ?></td>
        <td><?php echo $tampil['nama']; ?></td>
        <td><?php echo $tampil['departemen']; ?></td>
        <td><?php echo $tampil['tgl_mulai']; ?></td>
        <td><?php echo $tampil['tgl_selesai']; ?></td>
        <td><?php echo $tampil['jenis_cuti']; ?></td>
        <td><?php echo $tampil['alasan']; ?></td>
        <td align='center'>
            <a class="btn-kelola" href="form-persetujuan.php?id=<?php echo $tampil['id_pengajuan']; ?>">Kelola</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
