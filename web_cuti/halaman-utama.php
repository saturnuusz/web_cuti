<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <style>
    body, ul {
      margin: 0;
      padding: 0;
      font-family: system-ui, apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font-size: medium;
    }

    .content {
      background-color: white;
      height: 500px;
      padding-top: 5px;
      transition: margin-left 0.3s, width 0.3s;
    }

    tr, td {
      width: 100%;
    }

    .sidebar {
      background: white;
      color: #181717;
      width: 250px;
      height: 100%;
      position: fixed;
      transition: width 0.3s;
      box-shadow: 2px 0 5px rgba(0,0,0,0.1);
    }

    .sidebar.hidden {
      width: 60px;
    }

    .head {
      padding: 10px;
      background-color: orange;
      transition: margin-left 0.3s;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 2px 5px rgba(192,192,); 
    }

    .sidebar h2 {
      padding: 20px;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar ul li {
      padding: 10px 0;
    }

    .sidebar ul li a {
      display: block;
      color: #191515;
      text-decoration: none;
      padding: 10px;
      display: flex;
      align-items: center;
    }

    .sidebar ul li a img.icon {
      margin-right: 10px;
      width: 35px; /* Icon size increased */
      height: 35px; /* Icon size increased */
    }

    .sidebar ul li a:hover {
      background: #ffa748;
    }

    .main-content.sidebar-hidden {
      margin-left: 60px;
      width: calc(100% - 60px);
    }

    .main-content.sidebar-visible {
      margin-left: 250px;
      width: calc(100% - 250px);
    }

    .menu-toggle {
      font-size: 24px;
      background: none;
      border: none;
      cursor: pointer;
      margin-right: 10px;
    }

    .notification {
      padding: 5px 10px;
      display: flex;
      align-items: center;
    }

    .notification img {
      width: 30px;
      height: 35px; 
      margin-left: 10px;
      margin-right: 20px;
      filter: none; 
    }

    .sidebar.hidden ul li a .icon-text {
      display: none;
    }

    .logo {
      text-align: center;
      padding: 10px;
    }

    .logo img {
      width: 100px;
      height: 100px;
      transition: width 0.3s, height 0.3s;
    }

    .sidebar.hidden .logo img {
      width: 50px;
      height: 50px;
    }

    iframe {
      width: 100%;
      height: 100%;
      border: none;
      transition: margin-left 0.3s, width 0.3s;
    }

    .iframe-container {
      width: calc(100% - 250px);
      transition: margin-left 0.3s, width 0.3s;
    }

    .iframe-container.sidebar-hidden {
      margin-left: 60px;
      width: calc(100% - 60px);
    }

    .iframe-container.sidebar-visible {
      margin-left: 250px;
      width: calc(100% - 250px);
    }
  </style>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const menuToggle = document.getElementById('menu-toggle');
      const sidebar = document.querySelector('.sidebar');
      const mainContent = document.querySelector('.main-content');
      const iframeContainer = document.querySelector('.iframe-container');

      menuToggle.addEventListener('click', function() {
        sidebar.classList.toggle('hidden');
        mainContent.classList.toggle('sidebar-hidden');
        mainContent.classList.toggle('sidebar-visible');
        iframeContainer.classList.toggle('sidebar-hidden');
        iframeContainer.classList.toggle('sidebar-visible');
      });
    });

    function logout() {
      var konfirmasi = confirm('Apakah Anda yakin ingin logout?');
      if (konfirmasi) {
        sessionStorage.removeItem('loggedIn');
        window.location.href = 'login.php';
      }
    }
  </script>
</head>
<body>

  <div class="dashboard">
    <div class="sidebar">
      <div class="logo">
        <img src="images/logo.pt.png" alt="Logo">
      </div>
      <ul>
        <li><a href="dashboard.php" target="iframetarget"><img src="images/home.png" class="icon" alt="Home Icon"><span class="icon-text">Halaman Utama</span></a></li>
        <li><a href="http://localhost/web_cuti/index.php/karyawan" target="iframetarget"><img src="images/karyawan.png" class="icon" alt="User Icon"><span class="icon-text">Data Karyawan</span></a></li>
        <li><a href="http://localhost/web_cuti/index.php/departemen" target="iframetarget"><img src="images/departemen.png" class="icon" alt="Department Icon"><span class="icon-text">Data Departemen</span></a></li>
        <li><a href="http://localhost/web_cuti/datapengajuan.php" target="iframetarget"><img src="images/pengajuan.png" class="icon" alt="Leave Icon"><span class="icon-text">Pengajuan Cuti</span></a></li>
        <li><a href="data_cuti.php" target="iframetarget"><img src="images/cuti.png" class="icon" alt="Leave Icon"><span class="icon-text">Cuti Karyawan</span></a></li>
        <li><a href="#" onclick="logout()"><img src="images/logout.png" class="icon" alt="Logout Icon"><span class="icon-text">Logout</span></a></li>
      </ul>
    </div>

    <div class="head main-content sidebar-visible">
      <button class="menu-toggle" id="menu-toggle">&#9776;</button>
      <table border="0">
        <tr>
          <td><h3>PT SANNOHASHI MANUFACTURING INDONESIA</h3></td>
        </tr>
      </table>
      <div class="notification">
      <a href="profil.php" target="iframetarget"><img src="images/user.png" class="icon" alt="Leave Icon"></a>
      </div>
    </div>

    <div class="content main-content sidebar-visible iframe-container sidebar-visible">
    <iframe src="" name="iframetarget"><p>Selamat Datang</p></iframe>
    </div>
  </div>
</body>
</html>
