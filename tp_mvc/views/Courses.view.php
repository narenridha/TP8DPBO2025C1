<?php
class CoursesView
{
    public function render($data)
    {
        $no = 1;
        $dataCourses = null;
        foreach ($data as $val) {
            list($id, $course_name, $course_code, $is_open) = $val;
            if($is_open == 'open'){
                $is_open = "Open";
                $dataCourses .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $course_name . "</td>
                <td>" . $course_code . "</td>
                <td>" . $is_open . "</td>
                <td>
                    <a href='courses.php?id_edit=" . $id . "' class='btn btn-warning'>Edit</a>
                    <a href='courses.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
            }else{
                $is_open = "Closed";
                $dataCourses .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $course_name . "</td>
                <td>" . $course_code . "</td>
                <td>" . $is_open . "</td>
                <td>
                    <a href='courses.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
            }
        }

        $tpl = new Template("templates/courses.html");
        $tpl->replace("JUDUL", "Courses");
        $tpl->replace("DATA_TABEL", $dataCourses);
        $tpl->write();
    }
}