<?php
/*



Php naming rules

1) starts with latter or _  & always add $ sign with variable name

$_abc=10;  			true
$abc123=10; 		true
$123abc=10; 		false
$abc a123=10 false  // no space

==========================================================

Variable type : 

String   "nagar"
Integer  10
Float    10.50 (floating point numbers - also called double)  
Array    $arr=array["a","b","c"]

Boolean  yes/No
Object   $obj = new classname
NULL    
Resource

=================================================

php is loosely type laung due to not 
define any data type 

$a=10.5;

=================================================

PHP has three different variable scopes:

local  : in function that not user out of function { $a=10 }
global : out of function we can use any where 
static : static keywords  


====================================================== 


// both work same as print & declaration 

in c & c++

int i=10;
printf(i);

echo $a=10;


=========================================================

*/


echo $num=15 . "<br>";
echo $name="Rajesh nagar". "<br>";
echo $point=10.52. "<br>";

$students=array("raj","akash","mahesh");

echo $students[2];

?>