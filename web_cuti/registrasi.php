<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
<form action="" method="post">
    <h2 align="center">REGISTRASI</h2>
    <table>
        <tr><td><input type="text" name="id_user" placeholder="NIK" required></td></tr>
        <tr><td><input type="text" name="nama_email" placeholder="Email" required></td></tr>
        <tr><td><input type="password" name="sandi" placeholder="Kata Sandi" required></td></tr>
        <tr><td>
            <select name="grup" required>
                <option value="Admin">Admin</option>
                <option value="Supervisor">Supervisor</option>
                <option value="Karyawan">Karyawan</option>

            </select>
        </td></tr>
        <tr><td><input type="submit" value="Daftar"></td></tr>
        <tr><td>Sudah punya akun? <a href="login.php">Masuk</a></tr></td>
    </table>
</form>

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
    private $nama_email;
    private $sandi;
    private $grup;

    public function __construct($db, $id_user, $nama_email, $sandi, $grup) {
        $this->db = $db;
        $this->id_user = $id_user;
        $this->nama_email = $nama_email;
        $this->sandi = $sandi;
        $this->grup = $grup;
    }

    public function register() {
        $sql = "INSERT INTO user (id_user, nama_email, sandi, grup) VALUES ('$this->id_user', '$this->nama_email', '$this->sandi', '$this->grup')";
        if ($this->db->query($sql) === TRUE) {
            echo "<script>
                    alert('Akun Berhasil Dibuat');
                    window.location.href = 'login.php';
                  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->conn->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $id_user = $_POST['id_user'];
    $nama_email = $_POST['nama_email'];
    $sandi = $_POST['sandi'];
    $grup = $_POST['grup'];
    $user = new User($db, $id_user, $nama_email, $sandi, $grup);

    $user->register();
    $db->close();
}
?>
</body>
</html>
</html>
