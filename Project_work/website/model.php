<?php
class model{

    public $conn="";

    function __construct()
    {
                          //hostname uname pass dbname
       $this->conn=new mysqli('localhost','root','','topstech');
    }

    // Select Function
    function select($tbl){
        
    echo $sel="select * from $tbl";   // query
        $run=$this->conn->query($sel);   // query run
        while($fetch=$run->fetch_object())
        {
            $arr[]=$fetch;
        }
        return $arr;
    }


     // insert Function
    function insert($tbl,$arr){
        
        $col_arr=array_keys($arr);  // array('0'=>"cate_name",'1'=>"cate_image");
        $col=implode(",",$col_arr); // cate_name,cate_image

        $value_arr=array_values($arr);  // array('0'=>"kids",'1'=>"kids.jpg");
        $value=implode("','",$value_arr); // 'kids','kids.jpg'


        // insert into categories (cate_name,cate_image) values ('kids','kids.jpg')
        $ins="insert into $tbl ($col) values ('$value')";   // query
        $run=$this->conn->query($ins);   // query run
        return $run;

    }

}

$obj=new model;
?>