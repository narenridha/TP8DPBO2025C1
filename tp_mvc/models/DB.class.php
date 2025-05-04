<?php

class DB
{
    var $db_host = "localhost";
    var $db_user = "root";
    var $db_pass = "";
    var $db_name = "student_management";
    var $db_link = null;
    var $result = 0;

    function __construct($db_host, $db_user, $db_pass, $db_name)
    {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
    }

    function open()
    {
        $this->db_link = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if ($this->db_link->connect_error) {
            die("Connection failed: " . $this->db_link->connect_error);
        }
    }

    function execute($query)
    {
        $this->result = mysqli_query($this->db_link, $query);
        if ($this->result instanceof mysqli_result) {
            return $this->result;
        }
        return false;
    }

    function getResult()
    {
        if ($this->result instanceof mysqli_result) {
            return mysqli_fetch_array($this->result);
        }
        return false;
    }

    function close()
    {
        mysqli_close($this->db_link);
    }
}
