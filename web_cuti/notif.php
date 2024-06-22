<!DOCTYPE html>
<html>
<head>
<title>Pemberitahuan Cuti</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .header {
        text-align: center;
        margin-bottom: 20px;
    }
    .notification {
        padding: 15px;
        margin: 10px 0;
        background-color: #eee;
        border-radius: 4px;
        display: flex;
        align-items: center;
    }
    .notification-icon {
        margin-right: 10px;
    }
</style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Pemberitahuan</h2>
    </div>
    
    <?php
    // Contoh data pemberitahuan
    $notifications = [
        "Pengajuan Cuti Disetujui",
        "Pengajuan Cuti Ditolak",
        "Pengajuan Cuti Disetujui",
        "Pengajuan Cuti Disetujui",
        "Pengajuan Cuti Disetujui",
        "Pengajuan Cuti Disetujui",
        "Pengajuan Cuti Disetujui"
    ];
    
    // Menampilkan pemberitahuan
    foreach ($notifications as $notification) {
        echo "<div class='notification'>";
        echo "<div class='notification-icon'>⚫</div>";
        echo "<div class='notification-text'>$notification</div>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>
