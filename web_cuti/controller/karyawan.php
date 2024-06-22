<?php

class Karyawan { 
    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $karyawan = $this->model->getKaryawan();
        require "view/karyawan/list.php";
    }

    public function detail($id) {
        $karyawan = $this->model->read($id);
        require 'view/karyawan/detail.php';
    }

    public function create() {
        if ($_POST) {
            $this->model->insert();
            header("Location: http://localhost/web_cuti/index.php/karyawan");
        } else {
            require "view/karyawan/input.php";
        }
    }

    public function edit($id) {
        if ($_POST) {
            $this->model->update($id);
            header("Location: http://localhost/web_cuti/index.php/karyawan");
        } else {
            $karyawan = $this->model->read($id);
            require "view/karyawan/input.php";
        }
    }

    public function delete($id) {
        if ($id) {
            $this->model->delete($id);
            header("Location: http://localhost/web_cuti/index.php/karyawan");
        }
    }
}
?>
