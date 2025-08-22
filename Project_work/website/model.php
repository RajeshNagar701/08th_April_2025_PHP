<?php
class model
{

    public $conn = "";

    function __construct()
    {
        //hostname uname pass dbname
        $this->conn = new mysqli('localhost', 'root', '', 'topstech');
    }

    //single table Select Function
    function select($tbl)
    {
        echo $sel = "select * from $tbl";   // query
        $run = $this->conn->query($sel);   // query run
        while ($fetch = $run->fetch_object()) {
            $arr[] = $fetch;
        }
        return $arr;
    }

    function select_orderby($tbl, $col)
    {
        echo $sel = "select * from $tbl ORDER BY $col";   // query
        $run = $this->conn->query($sel);   // query run
        while ($fetch = $run->fetch_object()) {
            $arr[] = $fetch;
        }
        return $arr;
    }


    function select_decending($tbl, $col)
    {
        echo $sel = "select * from $tbl ORDER By $col desc";   // query
        $run = $this->conn->query($sel);   // query run
        while ($fetch = $run->fetch_object()) {
            $arr[] = $fetch;
        }
        return $arr;
    }

    //double table Select Function
    function double_select($tbl1, $tbl2, $col, $on)
    {
        // select * from categories join products on categories.id=product.cate_id
        echo $sel = "select $tbl1.*,$tbl2.$col from $tbl1 join $tbl2 on $on";   // query
        $run = $this->conn->query($sel);   // query run
        while ($fetch = $run->fetch_object()) {
            $arr[] = $fetch;
        }
        return $arr;
    }


    function select_where($tbl,$arr)
    {
        $sel="select * from $tbl where 1=1";  // query continue
        $col_arr = array_keys($arr); // array(0=>"email",1=>"password")
        $value_arr = array_values($arr);
        $i=0;
        foreach($arr as $c)
        {
           $sel.=" and $col_arr[$i]='$value_arr[$i]'";
           $i++;
        }
        $run = $this->conn->query($sel);   // query run
        return $run;
        
        //$chk=$run->num_rows;  // login

        /*

        $fetch = $run->fetch_object() // if single data

        while ($fetch = $run->fetch_object()) {   // multiple data fetch
            $arr[] = $fetch;
        }
        */ 
        
    }

    // insert Function
    function insert($tbl, $arr)
    {

        $col_arr = array_keys($arr);  // array('0'=>"cate_name",'1'=>"cate_image");
        $col = implode(",", $col_arr); // cate_name,cate_image

        $value_arr = array_values($arr);  // array('0'=>"kids",'1'=>"kids.jpg");
        $value = implode("','", $value_arr); // 'kids','kids.jpg'


        // insert into categories (cate_name,cate_image) values ('kids','kids.jpg')
        $ins = "insert into $tbl ($col) values ('$value')";   // query
        $run = $this->conn->query($ins);   // query run
        return $run;
    }
}

$obj = new model;
