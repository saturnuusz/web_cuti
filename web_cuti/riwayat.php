<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna dan Riwayat Cuti</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .profile-container, .leave-history {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 80%;
            max-width: 800px;
            margin-bottom: 20px;
        }
        .profile-container img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .profile-container h2, .leave-history h2 {
            color: #ff7f00;
            margin: 10px 0;
        }
        .profile-container label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
        }
        .profile-container input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .profile-container button {
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            background-color: #ff7f00;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2a63c;
            color: white;
        }
    </style>
</head>
<body>

<div class="leave-history">
    <h2>Riwayat Cuti</h2>
    <table>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Departemen</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Jenis Cuti</th>
            <th>Alasan</th>
            <th>Status</th>
        </tr>
        <?php
        // Sample data
        $data = [
            ['NIK' => '12345', 'Nama' => 'Budi', 'Departemen' => 'IT', 'Tanggal Mulai' => '2024-06-01', 'Tanggal Selesai' => '2024-06-10', 'Jenis Cuti' => 'Khusus', 'Alasan' => 'Vacation', 'Status' => 'Disetujui'],
            ['NIK' => '12346', 'Nama' => 'Budi', 'Departemen' => 'IT', 'Tanggal Mulai' => '2024-06-01', 'Tanggal Selesai' => '2024-06-10', 'Jenis Cuti' => 'Khusus', 'Alasan' => 'Sakit', 'Status' => 'Disetujui'],
            ['NIK' => '12347', 'Nama' => 'Budi', 'Departemen' => 'IT', 'Tanggal Mulai' => '2024-06-01', 'Tanggal Selesai' => '2024-06-10', 'Jenis Cuti' => 'Tahunan', 'Alasan' => 'Idul Adha', 'Status' => 'Disetujui'],
            ['NIK' => '12348', 'Nama' => 'Budi', 'Departemen' => 'IT', 'Tanggal Mulai' => '2024-06-01', 'Tanggal Selesai' => '2024-06-10', 'Jenis Cuti' => 'Tahunan', 'Alasan' => 'Idul Fitri', 'Status' => 'Disetujui'],
        ];

        // Generate table rows
        foreach ($data as $row) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['NIK']) . '</td>';
            echo '<td>' . htmlspecialchars($row['Nama']) . '</td>';
            echo '<td>' . htmlspecialchars($row['Departemen']) . '</td>';
            echo '<td>' . htmlspecialchars($row['Tanggal Mulai']) . '</td>';
            echo '<td>' . htmlspecialchars($row['Tanggal Selesai']) . '</td>';
            echo '<td>' . htmlspecialchars($row['Jenis Cuti']) . '</td>';
            echo '<td>' . htmlspecialchars($row['Alasan']) . '</td>';
            echo '<td>' . htmlspecialchars($row['Status']) . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>

</body>
</html>
