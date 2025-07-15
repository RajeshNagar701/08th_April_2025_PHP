<?php
date_default_timezone_set('asia/calcutta');

// time() print unix time-stamp 1, jan 1970
echo time()."<br>";



$oneday=time()+(10*24*60*60);
echo date('d/m/y',$oneday) . "<br>";

$onehour=time()+(5*60*60);
echo date('H:i:s',$onehour) . "<br>";



?>