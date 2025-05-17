<?php
date_default_timezone_set('asia/calcutta');

// time() print unix time-stamp 1, jan 1970
echo time()."<br>";

$futuredate=time()+(1*24*60*60);
echo date("d/m/y",$futuredate)."<br/>";


$futuretime=time()+(2*60*60);
echo date("H:i:s",$futuretime)."<br/>";

?>