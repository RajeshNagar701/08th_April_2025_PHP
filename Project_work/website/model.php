<?php
class model{

    public $conn="";

    function __construct()
    {
                          //hostname uname pass dbname
       $this->conn=new mysqli('localhost','root','','topstech');
    }

    function select($tbl){
        
    echo $sel="select * from $tbl";   // query
        $run=$this->conn->query($sel);   // query run
        while($fetch=$run->fetch_object())
        {
            $arr[]=$fetch;
        }
        return $arr;
    }

}

$obj=new model;
?>