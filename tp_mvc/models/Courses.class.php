<?php

class Courses extends DB
{
    function getCourses()
    {
        $query = "SELECT * FROM courses";
        return $this->execute($query);
    }

    function add($data)
    {
        $course_name = $data['course_name'];
        $course_code = $data['course_code'];

        $query = "INSERT INTO courses (course_name, course_code, is_open) VALUES ('$course_name', '$course_code', 'open')";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM courses WHERE id = '$id'";
        return $this->execute($query);
    }

    function isOpenUpdate($id)
    {
        $query = "UPDATE courses SET is_open = 'close' WHERE id = '$id'";
        return $this->execute($query);
    }
}