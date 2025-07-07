<?php
/* 
operators

Arithmetic operators    + - * / %   10/2=5   10%2=0

Assignment operators    =     += -= *= /=  %= $a=10; $b=10 $a+=$b $a=$a+$b  $a-=$b  $a=$a-$b

Comparison operators    == === > < >= <= !=

Increment/Decrement operators    a++    --  a=10 a++ echo 

Logical operators   &&     ||     !   if(a>b && a>c) if(a>b || a>c) if(!(a>b))

String operators    .    .=

Conditional assignment operators   (cond)?'if':'else';
Array operators 

*/
// Arithmetic + - * / %


/*
$a=11;
$b=20;
$sum=$b%$a;   20%11 = 9
echo $sum;
*/


//Assignment Operators / Shorthand operators  = += -= *= /=  %=   $a+=$b  $a=$a+$b;

/*
$x=10; 
$y=20;
 
$x += $y;     // $x=$x+$y

echo $x;
*/



//increement & decrimrent  ++ --

/*
$a=5;
$a++;
$a++;
echo $a."<br>";

$b=10;
$b--;
echo $b."<br>";
*/



// comparision operators   == > < >= <= ===

/*
$a=100;
$b="100";

if($a==$b) // check value equl to 
{
	echo "true";
}
else
{
	echo "false";
}
*/

/*
$a=100;
$b="100";

if($a===$b) // check data type  & value sam or not
{
	echo "true";
}
else
{
	echo "False";
}

*/






//logical operators   &&(and)  ||(or)   !(not)

/*
$a=5;
$b=10;
$c=2;

if($a<$b && $a<$c)    // ($a<$b || $a<$c) // !($a>$b)
{
	echo "both condition true";
}
else
{
	echo "Not Condition true";
}
*/


//String Operators   .   .=

/*
$a="Raj";
echo "Hello" . $a . "<br>";

$name="Rajesh";
$name.=" Nagar";
$name.=" .N";
echo $name;
*/

// conditional operators / turnory 

/*
$age=18;
if($age>18)
{
	echo "Man";
}
else
{
	echo "Child";
}
*/

// turnory operator conditional( ? : )   (cond)? yes : No

$age=17;
echo $ans=($age>=18)? "Man" : "Child";  // codition ? "yes":"no";   ?:


?>