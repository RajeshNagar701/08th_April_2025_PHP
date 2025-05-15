<?php

/*
Types of Errors in PHP
In PHP there are the four types of the errors:

1)Notice Error
2)Syntax Error or Parse Error

3)Fatal Error
4)Warning Error
*/


// 1) NOTICE ERROR/WARNING :  undefined var / not terminate script
/*
$a=10;
$b=20;

echo $a;
echo $B."<BR>";
echo "Hello";
*/



// 2) syntex/perse error:  syntex problem like ;  {}  <?php   
// terminate all script  

$a=10;
$b=20;
echo  $a;
echo $b;
echo "Hello";


//3) warning  :include file & if you include any non existing file than warning occures 
				// not terminate script

/*
include('include2.php');    // not terminate script 
echo "Hello";
echo "Hello";
*/




//4) fettale error : if you require any non existing file than fettale error occures 
					//terminate script
/*
require('Require2.php');    // terminate script 
echo "Hello";
echo "Hello";
*/
?>