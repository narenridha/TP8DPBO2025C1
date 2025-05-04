<?php

class Students extends DB
{
    function getStudents()
    {
        $query = "SELECT * FROM students";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $nim = $data['nim'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $status = "active";

        $query = "INSERT INTO students (name, nim, phone, join_date, status) VALUES ('$name', '$nim', '$phone', '$join_date', '$status')";
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM students WHERE id = '$id'";
        return $this->execute($query);
    }

    function statusStudent($id)
    {
        $query = "UPDATE students SET status = 'lulus' WHERE id = '$id'";
        return $this->execute($query);
    }
}