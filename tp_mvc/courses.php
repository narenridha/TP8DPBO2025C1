<?php
include_once("views/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Courses.controller.php");

$Courses = new CoursesController();

if (isset($_POST['submit'])) {
    // Handle adding a new course
    $data = $_POST;
    $Courses->add($data);
} else if (!empty($_GET['id_hapus'])) {
    // Handle deleting a course
    $id = $_GET['id_hapus'];
    $Courses->delete($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $Courses->edit($id);
} else {
    $Courses->index();
}