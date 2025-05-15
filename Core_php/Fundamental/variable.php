<?php
/*

$a=10; 
PHP Data Types

String   "nagar"
Integer  10
Float 10.50 (floating point numbers - also called double)  
Array    $arr=array["a","b","c"]

Boolean  yes/No
Object   $obj = new classname
NULL    
Resource

php is loosely type laung due to not 
define any data type $a=10.5;



PHP has three different variable scopes:

local  : in function that not user out of function { $a=10 }
global : out of function we can use any where 
static : static keywords  


Php naming rules

1) starts with latter or _

$_abc=10;  			true
$abc123=10; 		true
$123abc=10; 		false
$abc a123=10 false  // no space
 


// both work same as print & declaration 

in c & c++

int i=10;
printf(i);

echo $a=10;

*/



$a=10;  			// int
$name="raj nagar";  // string
$float=10.256354;   // float
$char='Y';         // char


echo "a value is ".$a."<br>";
echo "name is ".$name."<br>";
echo "float is ".$float."<br>";
echo "char is ".$char."<br>";



$x=10;
$y=20;
$sum=$x+$y;
echo "Sum of x & y is : ".$sum;

?>