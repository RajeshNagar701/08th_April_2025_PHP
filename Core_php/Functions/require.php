<?php

/*

require => require/load page 
require_once => require/load page only once

*/


require('require_demo1.php');
require('require_demo.php');
require('require_demo.php');
echo " Mornig";


/*
require_once('require_demo.php');
require_once('require_demo.php');
require_once('require_demo.php');
echo " Mornig";
*/


/*
Incude & require both same but if file not exits than 

Incude define E_warning so script not terminate 
Require gives Fetel Error so script terminate

So ideal Include use 

*/

?>