<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Enrollments.controller.php");

$Enrollment = new EnrollmentsController();

if (isset($_POST['submit'])) {
    // Handle adding new enrollment data
    $data = $_POST;
    $Enrollment->add($data);
} else if (!empty($_GET['id_hapus'])) {
    // Handle deleting enrollment data
    $id = $_GET['id_hapus'];
    $Enrollment->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // Handle editing enrollment data
    $id = $_GET['id_edit'];
    $Enrollment->edit($id);
} else {
    $Enrollment->index();
}