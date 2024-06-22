<?php
class Persetujuan_model {
    protected $db;

    public function __construct($database){
        $this->db = $database;
    }

    public function getPersetujuan() {
        $link = $this->db->openDbConnection();
        $result = $link->query("SELECT * FROM data_cuti ORDER BY id");

        $pengajuan = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $persetujan[] = $row;
        }
        $this->db->closeDbConnection($link);

        return $persetujuan;
    }

    public function read($id) {
        $link = $this->db->openDbConnection();

        $query = "SELECT * FROM data_cuti WHERE id = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $this->db->closeDbConnection($link);
        return $row;
    }

    public function insert() {
        $link = $this->db->openDbConnection();
        $query = "INSERT INTO data_cuti (nik, nama, departemen, divisi, jabatan, tgl_mulai, tgl_selesai, jenis_cuti, status_cuti, catatan) 
                  VALUES (:nik, :nama, :departemen, :divisi, :jabatan, :tgl_mulai, :tgl_selesai, :jenis_cuti, :status_cuti, :catatan)";
        $statement = $link->prepare($query);

        $statement->bindValue(':nik', $_POST['nik'], PDO::PARAM_STR);
        $statement->bindValue(':nama', $_POST['nama'], PDO::PARAM_STR);
        $statement->bindValue(':departemen', $_POST['departemen'], PDO::PARAM_STR);
        $statement->bindValue(':divisi', $_POST['divisi'], PDO::PARAM_STR);
        $statement->bindValue(':jabatan', $_POST['jabatan'], PDO::PARAM_STR);
        $statement->bindValue(':tgl_mulai', $_POST['tgl_mulai'], PDO::PARAM_STR);
        $statement->bindValue(':tgl_selesai', $_POST['tgl_selesai'], PDO::PARAM_STR);
        $statement->bindValue(':jenis_cuti', $_POST['jenis_cuti'], PDO::PARAM_STR);
        $statement->bindValue(':status_cuti', $_POST['status_cuti'], PDO::PARAM_STR);
        $statement->bindValue(':catatan', $_POST['catatan'], PDO::PARAM_STR);

        try {
            $statement->execute();
            echo "Data inserted successfully!";
        } catch (PDOException $e) {
            echo "Error inserting data: " . $e->getMessage();
        }

        $this->db->closeDbConnection($link);
    }

    public function update($id) {
        $link = $this->db->openDbConnection();
        $query = "UPDATE data_cuti SET nik = :nik, nama = :nama, departemen = :departemen, divisi = :divisi, tgl_mulai = :tgl_mulai, tgl_selesai = :tgl_selesai, jenis_cuti = :jenis_cuti, status_cuti = :status_cuti, catatan = :catatan WHERE id = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':nik', $_POST['nik'], PDO::PARAM_STR);
        $statement->bindValue(':nama', $_POST['nama'], PDO::PARAM_STR);
        $statement->bindValue(':departemen', $_POST['departemen'], PDO::PARAM_STR);
        $statement->bindValue(':divisi', $_POST['divisi'], PDO::PARAM_STR);
        $statement->bindValue(':jabatan', $_POST['jabatan'], PDO::PARAM_STR);        
        $statement->bindValue(':tgl_mulai', $_POST['tgl_mulai'], PDO::PARAM_STR);
        $statement->bindValue(':tgl_selesai', $_POST['tgl_selesai'], PDO::PARAM_STR);
        $statement->bindValue(':jenis_cuti', $_POST['jenis_cuti'], PDO::PARAM_STR);
        $statement->bindValue(':status_cuti', $_POST['status_cuti'], PDO::PARAM_STR);
        $statement->bindValue(':catatan', $_POST['catatan'], PDO::PARAM_STR);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }

    public function delete($id) {
        $link = $this->db->openDbConnection();
        $query = "DELETE FROM data_cuti WHERE id = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }
}
?>
