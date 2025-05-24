<!--
The header() function is an inbuilt function in PHP which is used 
to send a raw HTTP header. The HTTP functions are those functions 
which manipulate information sent to the client or browser by the 
Web server, before any other output has been sent. The PHP header()
 function send a HTTP header to a client or browser in raw form. 
 Before HTML, XML, JSON or other output has been sent to a browser
 or client, a raw data is sent with request (especially HTTP Request)
 made by the server as header information. HTTP header provide 
 required information about the object sent in the message body 
 more precisely about the request and response. 

-->

<h1>Hi am Header Function</h1>
<?php

$a=10;
if($a>9)
{
		// redirect on wellcome_location.php
	header('location:wellcome_location.php');
}
else
{
	echo "Wrong";
}	



?>
