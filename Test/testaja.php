<?php
require_once 'models/Buku.php';

class BukuController {
    private $model;

    public function __construct($db) {
        $this->model = new Buku($db);
    }

    public function index() {
        $buku = $this->model->getAll();
        require 'views/index.php';
    }

    public function create() {
        require 'views/create.php';
    }

    public function store($data) {
        if($this->model->insert($data)) {
            header("Location: index.php");
        }
    }

    public function edit($id) {
        $buku = $this->model->getById($id);
        require 'views/edit.php';
    }

    public function update($id, $data) {
        if($this->model->update($id, $data)) {
            header("Location: index.php");
        }
    }

    public function delete($id) {
        if($this->model->delete($id)) {
            header("Location: index.php");
        }
    }
}
?>