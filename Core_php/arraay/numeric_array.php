<?php

/*
// array is collection values


$a="raj";
$b="akash";
$c="mahesh";

$names=array("Raj","akash","mahesh");   // array("0"=>"Raj","1"=>"akash","2"=>"Mahesh");


print_r($names)       // output : array("0"=>"Raj","1"=>"akash","2"=>"Mahesh");
echo $names[1];       // output : akash

collections of values

$nemeric=array("a","b","c","d","e");  index auto generate 0
echo $nemeric[1];    

$associate=array("10"=>"a","20"=>"b","30"=>"c");  // associate array("id"=>"1","name"=>"rajesh","email"=>"rajesh@gmail.com");
echo $associate[30];


$multidemetional=array("a","b"=>array("p","q"),"c");  // multidemetional

echo $multidemetional[b][1]

*/

$name="a";
$name1="b";
$name2="c";

$arr=array("a","b","c","d","e","f","g","h","i","j","k");  
print_r($arr);


echo $arr[2];

for($i=0;$i<count($arr);$i++)
{
	echo $arr[$i]."<br>";
}

// frecah for loop array
foreach($arr as $w)
{
	echo $w."<br>";
}



?>