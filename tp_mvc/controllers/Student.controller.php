<?php
include_once("conf.php");
include_once("models/Students.class.php");
include_once("views/Students.view.php");

class StudentController
{
    private $student;

    function __construct()
    {
        $this->student = new Students(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        // echo "<h1>Student Management</h1>";
        $this->student->open();
        $this->student->getStudents();

        $data = array();
        while ($row = $this->student->getResult()) {
            array_push($data, $row);
        }

        $this->student->close();

        $view = new StudentView();
        $view->render($data);
    }

    function add($data)
    {
        $this->student->open();
        $this->student->add($data);
        $this->student->close();

        header("location:index.php");
    }

    function edit($id)
    {
        $this->student->open();
        $this->student->statusStudent($id);
        $this->student->close();

        header("location:index.php");
    }

    function delete($id)
    {
        $this->student->open();
        $this->student->delete($id);
        $this->student->close();

        header("location:index.php");
    }
}