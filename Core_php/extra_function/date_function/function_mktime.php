<?php
date_default_timezone_set('asia/calcutta');


echo $d=date("d/m/y")."<br/>";

$date=mktime(0,0,0,date("m")+2,date("d")+2,date("y")+4); // difine future date but add 0,0,0
echo $d=date("d/m/y",$date)."<br/>";


$time=mktime(date("h")+2,date("i")+2,date("s")+4); 
echo $d=date("h:i:s a",$time)."<br/>";
?>