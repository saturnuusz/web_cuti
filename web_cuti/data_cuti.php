<!DOCTYPE html>
<html>
<head>
    <title>Data Cuti</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        table {
            border: 0px;
            float: left;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th {
            background-color: orange;
            text-align: center;
        }

        td, th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        tr:nth-child(odd):hover,
        tr:nth-child(even):hover {
            background-color: orange;
        }
    </style>
</head>

<body>
    <h2 align="center">DATA CUTI</h2>
    <form method="GET" action="data_cuti.php">
    </form>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_cutikaryawan";

    $koneksi = new mysqli($servername, $username, $password, $dbname);

    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    }

    $query = "SELECT * FROM data_cuti";

    if (isset($_GET['cari'])) {
        $keyword = $_GET['cari'];
        $query .= " WHERE nama LIKE '%$keyword%' OR departemen LIKE '%$keyword%' OR status_cuti LIKE '%$keyword%'";
    }

    $query .= " ORDER BY nik ASC";
    $result = $koneksi->query($query);

    if (!$result) {
        die("Error: " . $koneksi->error);
    }
    ?>

    <table border="1">
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Departemen</th>
            <th>Divisi</th>
            <th>Jabatan</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Jenis Cuti</th>
            <th>Status</th>
            <th>Catatan</th>
        </tr>

        <?php
        $no = 1;
        while ($tampil = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?php echo $tampil['nik']; ?></td>
                <td width="100"><?php echo $tampil['nama']; ?></td>
                <td width="100"><?php echo $tampil['departemen']; ?></td>
                <td width="100"><?php echo $tampil['divisi']; ?></td>
                <td width="100"><?php echo $tampil['jabatan']; ?></td>
                <td><?php echo $tampil['tanggal_mulai']; ?></td>
                <td><?php echo $tampil['tanggal_selesai']; ?></td>
                <td><?php echo $tampil['jenis_cuti']; ?></td>
                <td><?php echo $tampil['status_cuti']; ?></td>
                <td><?php echo $tampil['catatan']; ?></td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </table>
</body>
</html>
