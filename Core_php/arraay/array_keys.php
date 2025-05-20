<?php
$a=array("name"=>"KEYUR","email"=>"raj@gmail.com","mobile"=>"124567891"); // saprate key and value 1 to make it 2 array


print_r($a);

echo "<br>";

$key_arr=array_keys($a);
print_r($key_arr);

echo "<br>";

$value_arr=array_values($a);
print_r($value_arr);

echo "<br>";

echo "insert into customer(key) values (values)";

?>