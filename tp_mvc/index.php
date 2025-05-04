<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Student.controller.php");

$Student = new StudentController();

if (isset($_POST['submit'])) {
    // Lengkapi bagian untuk mengambil post data
    $data = $_POST;
    $Student->add($data);
} else if (!empty($_GET['id_hapus'])) {
    // Lengkapi bagian untuk menghapus data
    $id = $_GET['id_hapus'];
    $Student->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // Lengkapi bagian untuk mengedit status data
    $id = $_GET['id_edit'];
    $Student->edit($id);
} else {
    $Student->index();
}
