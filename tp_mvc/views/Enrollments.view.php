<?php
class EnrollmentsView
{
    public function render($data)
    {
        $no = 1;
        $dataEnrollments = null;
        $dataStudents = null;
        $dataCourses = null;
        foreach ($data['enrollments'] as $val) {
            list($id, $student_name, $course_name, $enrollment_date, $status) = $val;
            if($status == 'on_going'){
                $status = "On Going";
                $dataEnrollments .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $student_name . "</td>
                <td>" . $course_name . "</td>
                <td>" . $enrollment_date . "</td>
                <td>" . $status . "</td>
                <td>
                    <a href='enrollments.php?id_edit=" . $id . "' class='btn btn-warning'>Edit</a>
                    <a href='enrollments.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
            }else{
                $status = "Completed";
                $dataEnrollments .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $student_name . "</td>
                <td>" . $course_name . "</td>
                <td>" . $enrollment_date . "</td>
                <td>" . $status . "</td>
                <td>
                    <a href='enrollments.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
            }
        }

        foreach($data['students'] as $val) {
            list($id, $name, $nim, $phone, $join_date, $status) = $val;
            if($status == 'active'){
                $dataStudents .= "<option value='" . $id . "'>" . $name . "</option>";
            }
        }

        foreach($data['courses'] as $val) {
            list($id, $course_name, $course_code,$is_open) = $val;
            if($is_open == 'open'){
                $dataCourses .= "<option value='" . $id . "'>" . $course_name . "</option>";
            }
        }

        $tpl = new Template("templates/enrollments.html");
        $tpl->replace("JUDUL", "Enrollments");
        $tpl->replace("OPTION_STUDENTS", $dataStudents);
        $tpl->replace("OPTION_COURSES", $dataCourses);
        $tpl->replace("DATA_TABEL", $dataEnrollments);
        $tpl->write();
    }
}