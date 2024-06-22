<?php
class Pengajuan_cuti {
    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $pengajuan = $this->model->getPengajuancuti();
        require "view/pengajuan_cuti/datapengajuan.php";
    }

    public function detail($id) {
        $pengajuan = $this->model->read($id);
        require 'view/pengajuan_cuti/pengajuan_cuti.php';
    }

    public function create() {
        if ($_POST) {
            $this->model->insert();
            header("Location: http://localhost/web_cuti/index.php/pengajuan_cuti");
        } else {
            require "view/pengajuan_cuti/form_pengajuan_cuti.php";
        }
    }

    public function kelola($id) {
        if ($_POST) {
            $this->model->update($id);
            header("Location: http://localhost/web_cuti/index.php/pengajuan_cuti");
        } else {
            $pengajuan = $this->model->read($id);
            require "view/pengajuan_cuti/approval.php";
        }
    }

    public function delete($id) {
        if ($id) {
            $this->model->delete($id);
            header("Location: http://localhost/web_cuti/index.php/pengajuan_cuti");
        }
    }
}
?>
