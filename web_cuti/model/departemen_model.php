<?php

class Departemen_model {
    protected $db;

    public function __construct($database){
        $this->db = $database;
    }

    public function getDepartemen() {
        $link = $this->db->openDbConnection();
        $result = $link->query("SELECT * FROM departemen ORDER BY kode");

        $departemen = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $departemen[] = $row;
        }
        $this->db->closeDbConnection($link);

        return $departemen;
    }

    public function read($id) {
        $link = $this->db->openDbConnection();

        $query = "SELECT * FROM departemen WHERE kode = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $this->db->closeDbConnection($link);
        return $row;
    }

    public function insert() {
        $link = $this->db->openDbConnection();
        $query = "INSERT INTO departemen (nama_departemen, nama_divisi, jabatan, jumlah_karyawan) 
                  VALUES (:nama_departemen, :nama_divisi, :jabatan, :jumlah_karyawan)";
        $statement = $link->prepare($query);
        $statement->bindValue(':nama_departemen', $_POST['nama_departemen'], PDO::PARAM_STR);
        $statement->bindValue(':nama_divisi', $_POST['nama_divisi'], PDO::PARAM_STR);
        $statement->bindValue(':jabatan', $_POST['jabatan'], PDO::PARAM_STR);
        $statement->bindValue(':jumlah_karyawan', $_POST['jumlah_karyawan'], PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }

    public function update($id) {
        $link = $this->db->openDbConnection();
        $query = "UPDATE departemen SET nama_departemen = :nama_departemen, nama_divisi = :nama_divisi, jabatan = :jabatan, jumlah_karyawan = :jumlah_karyawan WHERE kode = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':nama_departemen', $_POST['nama_departemen'], PDO::PARAM_STR);
        $statement->bindValue(':nama_divisi', $_POST['nama_divisi'], PDO::PARAM_STR);
        $statement->bindValue(':jabatan', $_POST['jabatan'], PDO::PARAM_STR);
        $statement->bindValue(':jumlah_karyawan', $_POST['jumlah_karyawan'], PDO::PARAM_INT);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }

    public function delete($id) {
        $link = $this->db->openDbConnection();
        $query = "DELETE FROM departemen WHERE kode = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }
}
?>
