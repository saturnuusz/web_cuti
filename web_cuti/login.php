<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
}

table {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  text-align: center;
}

form {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 8px;
}

input, select {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="submit"] {
  background-color: orange;
  color: #fff;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #FF7A00;
}
</style>
</head>
<body>
<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "db_cutikaryawan";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function close() {
        $this->conn->close();
    }
}

class User {
    private $db;
    private $id_user;
    private $sandi;

    public function __construct($db, $id_user, $sandi) {
        $this->db = $db;
        $this->id_user = $id_user;
        $this->sandi = $sandi;
    }

    public function authenticate() {
        $sql = "SELECT grup FROM user WHERE id_user='$this->id_user' AND sandi='$this->sandi'";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['grup'];
        } else {
            return false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $id_user = $_POST['id_user'];
    $sandi = $_POST['sandi'];
    $user = new User($db, $id_user, $sandi);

    $grup = $user->authenticate();
    if ($grup) {
      switch ($grup) {
          case "Admin":
              header("Location: halaman-utama.php");
              break;
          case "Supervisor":
              header("Location: halaman_supervisor.php");
              break;
          case "Karyawan":
              header("Location: halaman_karyawan.php");
              break;
      }
      exit;
  } else {
      echo "<script>alert('ID User atau Kata Sandi salah');</script>";
  }

    $db->close();
}
?>
<form action="" method="post">
  <h2>LOGIN</h2>
  <table>
    <tr><td><input type="text" name="id_user" placeholder="Masukkan NIK" required></td></tr>
    <tr><td><input type="password" name="sandi" placeholder="Kata Sandi" required></td></tr>
    <tr><td><input type="submit" value="Login"></td></tr>
    <tr><td>Belum punya akun? <a href="registrasi.php">Daftar</a></td></tr>
  </table>
  <br>
  <img src="images/logo-pt.png" alt="Logo" width="100">
</form>
</body>
</html>
