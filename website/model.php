<?php

class model
{
    public $conn = "";

    function __construct()
    {
        // Connect to the database
        $this->conn = new mysqli('localhost', 'root', '', 'php_project');

    }

    // for the data view into admin panel
    function table_select($table)
    {
        $sel = "SELECT * FROM $table";
        $run = $this->conn->query($sel);
        while ($fetch = $run->fetch_object()) {
            $arr[] = $fetch;
        }
        if (!empty($arr)) {
            return $arr;
        }
    }

    // store data into database function

    function insert($tbl, $arr)
    {
        $col_arr = array_keys($arr);
        $col = implode(",", $col_arr);

        $value_arr = array_map([$this->conn, 'real_escape_string'], array_values($arr));
        $value = implode("','", $value_arr);

        $ins = "INSERT INTO $tbl ($col) VALUES ('$value')";
        $run = $this->conn->query($ins);
        return $run;
    }

    // for login // select where data fetch

    function select_where($tbl, $where)
    {
        $col_w = array_keys($where);
        $value_w = array_values($where);

        $sel = "select * from $tbl where 1=1"; // 1=1 means query continue
        $i = 0;
        foreach ($where as $w) {
            $sel .= " and $col_w[$i]='$value_w[$i]'";
            $i++;
        }
        $run = $this->conn->query($sel);
        return $run;
    }

    // Delete data from manage admin side 

    function delete_where($tbl, $where)
    {
        $col_w = array_keys($where);
        $value_w = array_values($where);

        $del = "DELETE FROM  $tbl where 1=1"; // 1=1 means query continue
        $i = 0;
        foreach ($where as $w) {
            $del .= " and $col_w[$i]='$value_w[$i]'";
            $i++;
        }
        $run = $this->conn->query($del);
        return $run;
    }

    // Edit data function and update

    function update_where($tbl, $data, $where)
    {
        $upd = "UPDATE $tbl set";

        $col_d = array_keys($data);
        $value_d = array_values($data);
        $j = 0;

        $count = count($data);
        foreach ($data as $d) {
            if ($count == $j + 1) {
                $upd .= " $col_d[$j]='$value_d[$j]'";
            } else {
                $upd .= " $col_d[$j]='$value_d[$j]' , ";
                $j++;
            }
        }

        $upd .= " where 1=1";
        $col_w = array_keys($where);
        $value_w = array_values($where);
        $i = 0;
        foreach ($where as $w) {
            echo $upd .= " and $col_w[$i]='$value_w[$i]'";
            $i++;
        }
        $run = $this->conn->query($upd);
        return $run;
    }


}

$obj = new model;

?>