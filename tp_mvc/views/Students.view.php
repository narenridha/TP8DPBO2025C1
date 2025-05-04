<?php
class StudentView
{
    public function render($data)
    {
        $no = 1;
        $dataStudents = null;
        foreach ($data as $val) {
            list($id, $name, $nim, $phone, $join_date, $status) = $val;
            if($status == 'active'){
                $status = "Active";
                $dataStudents .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $nim . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>
                <td>" . $status . "</td>
                <td>
                <a href='index.php?id_edit=" . $id . "' class='btn btn-warning'>Edit</a>
                <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
                </tr>";
            }else{
                $status = "Graduated";
                $dataStudents .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $nim . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>
                <td>" . $status . "</td>
                <td>
                <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
                </tr>";
            }
        }


        
        
        $tpl = new Template("templates/index.html");
        $tpl->replace("JUDUL", "Students");
        $tpl->replace("DATA_TABEL", $dataStudents);
        $tpl->write();
    }
}