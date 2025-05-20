<?php

/*
sort() - sort arrays in ascending order
rsort() - sort arrays in descending order


asort() - sort associative arrays in ascending order, according to the value
arsort() - sort associative arrays in descending order, according to the value


ksort() - sort associative arrays in ascending order, according to the key
krsort() - sort associative arrays in descending order, according to the key

*/
$a=array("a"=>"banana","b"=>"apple","c"=>"mango"); // value sort accendind order

asort($a);     // value sort accending order A-Z
print_r($a);

echo "<br>";
arsort($a);     // value sort deccending order Z-A
print_r($a);
?>