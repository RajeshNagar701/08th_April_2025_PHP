<?php

// encription & decription function


$pass="Love";
echo $encpass=base64_encode($pass);
echo "<br>";
echo $decpass=base64_decode($encpass);
echo "<br>";

echo $md5=md5($pass);
echo "<br>";


echo $sha1=sha1($pass);
echo "<br>";

?>  