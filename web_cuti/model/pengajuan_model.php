<?php
class Pengajuancuti_model {
    protected $db;

    public function __construct($database){
        $this->db = $database;
    }

    public function getPengajuancuti() {
        $link = $this->db->openDbConnection();
        $result = $link->query("SELECT * FROM pengajuan_cuti ORDER BY id_pengajuan");

        $pengajuan = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $pengajuan[] = $row;
        }
        $this->db->closeDbConnection($link);

        return $pengajuan;
    }

    public function read($id) {
        $link = $this->db->openDbConnection();

        $query = "SELECT * FROM pengajuan_cuti WHERE id_pengajuan = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $this->db->closeDbConnection($link);
        return $row;
    }

    public function insert() {
        $link = $this->db->openDbConnection();
        $query = "INSERT INTO pengajuan_cuti (nik, nama, departemen, tgl_mulai, tgl_selesai, jenis_cuti, alasan, tgl_mengajukan) 
                  VALUES (:nik, :nama, :departemen, :tgl_mulai, :tgl_selesai, :jenis_cuti, :alasan, :tgl_mengajukan)";
        $statement = $link->prepare($query);

        $statement->bindValue(':nik', $_POST['nik'], PDO::PARAM_STR);
        $statement->bindValue(':nama', $_POST['nama'], PDO::PARAM_STR);
        $statement->bindValue(':departemen', $_POST['departemen'], PDO::PARAM_STR);
        $statement->bindValue(':tgl_mulai', $_POST['tgl_mulai'], PDO::PARAM_STR);
        $statement->bindValue(':tgl_selesai', $_POST['tgl_selesai'], PDO::PARAM_STR);
        $statement->bindValue(':jenis_cuti', $_POST['jenis_cuti'], PDO::PARAM_STR);
        $statement->bindValue(':alasan', $_POST['alasan'], PDO::PARAM_STR);
        $statement->bindValue(':tgl_mengajukan', $_POST['tgl_mengajukan'], PDO::PARAM_STR);

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
        $query = "UPDATE pengajuan_cuti SET nik = :nik, nama = :nama, departemen = :departemen, tgl_mulai = :tgl_mulai, tgl_selesai = :tgl_selesai, jenis_cuti = :jenis_cuti, alasan = :alasan, tgl_mengajukan = :tgl_mengajukan WHERE id_pengajuan = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':nik', $_POST['nik'], PDO::PARAM_STR);
        $statement->bindValue(':nama', $_POST['nama'], PDO::PARAM_STR);
        $statement->bindValue(':departemen', $_POST['departemen'], PDO::PARAM_STR);
        $statement->bindValue(':tgl_mulai', $_POST['tgl_mulai'], PDO::PARAM_STR);
        $statement->bindValue(':tgl_selesai', $_POST['tgl_selesai'], PDO::PARAM_STR);
        $statement->bindValue(':jenis_cuti', $_POST['jenis_cuti'], PDO::PARAM_STR);
        $statement->bindValue(':alasan', $_POST['alasan'], PDO::PARAM_STR);
        $statement->bindValue(':tgl_mengajukan', $_POST['tgl_mengajukan'], PDO::PARAM_STR);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }

    public function delete($id) {
        $link = $this->db->openDbConnection();
        $query = "DELETE FROM pengajuan_cuti WHERE id_pengajuan = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection($link);
    }
}
?>
