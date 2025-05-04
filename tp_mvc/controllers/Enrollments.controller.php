<?php
include_once("conf.php");
include_once("models/Students.class.php");
include_once("models/Courses.class.php");
include_once("models/Enrollments.class.php");
include_once("views/Enrollments.view.php");

class EnrollmentsController
{
    private $students;
    private $courses;
    private $enrollments;

    function __construct()
    {
        $this->students = new Students(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->courses = new Courses(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->enrollments = new Enrollments(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->students->open();
        $this->courses->open();
        $this->enrollments->open();

        $this->students->getStudents();
        $this->courses->getCourses();
        $this->enrollments->getEnrollments();

        $data = array(
            'students' => array(),
            'courses' => array(),
            'enrollments' => array()
        );

        while ($row = $this->students->getResult()) {
            array_push($data['students'], $row);
        }
        while ($row = $this->courses->getResult()) {
            array_push($data['courses'], $row);
        }
        while ($row = $this->enrollments->getResult()) {
            array_push($data['enrollments'], $row);
        }

        $this->students->close();
        $this->courses->close();
        $this->enrollments->close();

        $view = new EnrollmentsView();
        $view->render($data);
    }

    function add($data)
    {
        $this->enrollments->open();
        $this->enrollments->add($data);
        $this->enrollments->close();

        header("location:enrollments.php");
    }

    function edit($id)
    {
        $this->enrollments->open();
        $this->enrollments->statusUpdate($id);
        $this->enrollments->close();

        header("location:enrollments.php");
    }

    function delete($id)
    {
        $this->enrollments->open();
        $this->enrollments->delete($id);
        $this->enrollments->close();

        header("location:enrollments.php");
    }
}