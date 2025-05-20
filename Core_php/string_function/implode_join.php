<?php

//convert array in string 

$arr=array("Hindi","English","Gujarati"); //array("0"=>"Hindi","1"=>"Englis","2"=>"Gujarati")

print_r($arr);


//echo $arr[1];

echo $string=implode(",",$arr)."<br>"; // "Hindi,Englis,Gujarati"

?>