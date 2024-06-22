<?php

class Departemen {
    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $departemen = $this->model->getDepartemen();
        require "view/departemen/list.php";
    }

    public function detail($id) {
        $departemen = $this->model->read($id);
        require 'view/departemen/detail.php';
    }

    public function create() {
        if ($_POST) {
            $this->model->insert();
            header("Location: http://localhost/web_cuti/index.php/departemen");
        } else {
            require "view/departemen/input.php";
        }
    }

    public function edit($id) {
        if ($_POST) {
            $this->model->update($id);
            header("Location: http://localhost/web_cuti/index.php/departemen");
        } else {
            $departemen = $this->model->read($id);
            require "view/departemen/input.php";
        }
    }

    public function delete($id) {
        if ($id) {
            $this->model->delete($id);
            header("Location: http://localhost/web_cuti/index.php/departemen");
        }
    }
}

?>
