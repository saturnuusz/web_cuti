<?php

class Karyawan_model {
    protected $db;

    public function __construct($database){
        $this->db = $database;
    }

    public function getKaryawan() {
        $link = $this->db->openDbConnection();
        $result = $link->query("SELECT * FROM karyawan ORDER BY Id");

        $karyawan = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $karyawan[] = $row;
        }
        $this->db->closeDbConnection($link);

        return $karyawan;
    }

    public function read($id) {
        $link = $this->db->openDbConnection();

        $query = "SELECT * FROM karyawan WHERE Id = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $this->db->closeDbConnection($link);
        return $row;
    }

    public function insert() {
        $link = $this->db->openDbConnection();
        $query = "INSERT INTO karyawan (nik, nama, tanggal_lahir, jenis_kelamin, departemen, alamat, no_hp, tgl_masuk) 
                  VALUES (:nik, :nama, :tanggal_lahir, :jenis_kelamin, :departemen, :alamat, :no_hp, :tgl_masuk)";
        $statement = $link->prepare($query);
        $statement->bindValue(':nik', $_POST['nik'], PDO::PARAM_INT);
        $statement->bindValue(':nama', $_POST['nama'], PDO::PARAM_STR);
        $statement->bindValue(':tanggal_lahir', $_POST['tanggal_lahir'], PDO::PARAM_STR);
        $statement->bindValue(':jenis_kelamin', $_POST['jenis_kelamin'], PDO::PARAM_STR);
        $statement->bindValue(':departemen', $_POST['departemen'], PDO::PARAM_STR);
        $statement->bindValue(':alamat', $_POST['alamat'], PDO::PARAM_STR);
        $statement->bindValue(':no_hp', $_POST['no_hp'], PDO::PARAM_INT);
        $statement->bindValue(':tgl_masuk', $_POST['tgl_masuk'], PDO::PARAM_STR);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }

    public function update($id) {
        $link = $this->db->openDbConnection();
        $query = "UPDATE karyawan SET nik = :nik, nama = :nama, tanggal_lahir = :tanggal_lahir, jenis_kelamin = :jenis_kelamin, departemen = :departemen, alamat = :alamat, no_hp = :no_hp, tgl_masuk = :tgl_masuk WHERE Id = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':nik', $_POST['nik'], PDO::PARAM_INT);
        $statement->bindValue(':nama', $_POST['nama'], PDO::PARAM_STR);
        $statement->bindValue(':tanggal_lahir', $_POST['tanggal_lahir'], PDO::PARAM_STR);
        $statement->bindValue(':jenis_kelamin', $_POST['jenis_kelamin'], PDO::PARAM_STR);
        $statement->bindValue(':departemen', $_POST['departemen'], PDO::PARAM_STR);
        $statement->bindValue(':alamat', $_POST['alamat'], PDO::PARAM_STR);
        $statement->bindValue(':no_hp', $_POST['no_hp'], PDO::PARAM_INT);
        $statement->bindValue(':tgl_masuk', $_POST['tgl_masuk'], PDO::PARAM_STR);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }

    public function delete($id) {
        $link = $this->db->openDbConnection();
        $query = "DELETE FROM karyawan WHERE Id = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }
}
?>
