<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- Latest compiled JavaScript -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        
		<h1 class="text-center bg-primary text-white p-5">Hello About Page</h1>
		
		<?php
			$name="Raj nagar";
			echo "<h1>hello how are you : " . $name . "</h1>";
		?>
		
		<h1> hello how are you : {{$name}} </h1>
    </body>
</html>
