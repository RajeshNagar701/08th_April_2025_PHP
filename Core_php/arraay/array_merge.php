<?php
$a=array("a"=>"TIGER","b"=>"LION"); // MERGE 2 ARRAY TO 1 ARRAY
$b=array("a"=>"TIGER","c"=>"DOG");
print_r(array_merge($a,$b)); // merge 2 arr in one

echo "<br>";

print_r(array_merge_recursive($a,$b)); // merge 2 arr in one
?>