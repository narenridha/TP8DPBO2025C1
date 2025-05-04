<?php

class Enrollments extends DB
{
    function getEnrollments()
    {
        $query = "SELECT enrollments.id, students.name AS student_name, courses.course_name AS course_name, enrollments.enrollment_date, enrollments.status
                  FROM enrollments
                  JOIN students ON enrollments.student_id = students.id
                  JOIN courses ON enrollments.course_id = courses.id";
        return $this->execute($query);
    }

    function add($data)
    {
        $student_id = $data['student_id'];
        $course_id = $data['course_id'];
        $enrollment_date = $data['enrollment_date'];

        $query = "INSERT INTO enrollments (student_id, course_id, enrollment_date, status) VALUES ('$student_id', '$course_id', '$enrollment_date', 'on_going')";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM enrollments WHERE id = '$id'";
        return $this->execute($query);
    }

    function statusUpdate($id)
    {

        $query = "UPDATE enrollments SET status = 'finished' WHERE id = '$id'";
        return $this->execute($query);
    }
}