<?php
class Persetujuan_cuti {
    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $pengajuan = $this->model->getPersetujuancuti();
        require "view/pen_cuti/data_cuti.php";
    }

    public function detail($id) {
        $pengajuan = $this->model->read($id);
        require 'view/persetujuan_cuti/persetujuan_cut.php';
    }

    public function create() {
        if ($_POST) {
            $this->model->insert();
            header("Location: http://localhost/web_cuti/index.php/persetujuan_cuti");
        } else {
            require "view/persetujuan/form_persetujuan_cuti.php";
        }
    }

    public function kelola($id) {
        if ($_POST) {
            $this->model->update($id);
            header("Location: http://localhost/web_cuti/index.php/persetujuan_cuti");
        } else {
            $pengajuan = $this->model->read($id);
            require "view/persetujuan_cuti/approval.php";
        }
    }

    public function delete($id) {
        if ($id) {
            $this->model->delete($id);
            header("Location: http://localhost/web_cuti/index.php/persetujuan_cuti");
        }
    }
}
?>
