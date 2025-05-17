<?php
date_default_timezone_set('asia/calcutta');

// find future date
echo date("d/m/y")."<br/>";
$futuredate=mktime(0,0,0,date("m")+2,date("d")+2,date("y")+2); // difine future date but add 0,0,0
echo date("d/m/y",$futuredate)."<br/>";


// find future time
echo date("H:i:s")."<br/>";
$futuretime=mktime(date("H")+2,date("i"),date("s")); // difine future date but add 0,0,0
echo date("H:i:s",$futuretime)."<br/>";

?>