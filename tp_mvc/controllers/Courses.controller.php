<?php
include_once("conf.php");
include_once("models/Courses.class.php");
include_once("views/Courses.view.php");

class CoursesController
{
    private $courses;

    function __construct()
    {
        $this->courses = new Courses(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->courses->open();
        $this->courses->getCourses();

        $data = array();
        while ($row = $this->courses->getResult()) {
            array_push($data, $row);
        }

        $this->courses->close();

        $view = new CoursesView();
        $view->render($data);
    }

    function add($data)
    {
        $this->courses->open();
        $this->courses->add($data);
        $this->courses->close();

        header("location:courses.php");
    }

    function edit($id)
    {
        $this->courses->open();
        $this->courses->isOpenUpdate($id);
        $this->courses->close();

        header("location:courses.php");
    }

    function delete($id)
    {
        $this->courses->open();
        $this->courses->delete($id);
        $this->courses->close();

        header("location:courses.php");
    }
}