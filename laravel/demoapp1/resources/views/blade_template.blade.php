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
        
		<h1>Hello Welcome Balde Template</h1>
		
		<?php 
			$name="Raj nagar";
			echo "<h1>Hi hello " . $name . "</h1>"; 
		?>
		
		<h1>{{"Hi hello " . $name }}</h1>
    
		<h1>{{10+10}}</h1>
		<h1><?php echo 10+10; ?></h1>
	
	
		<?php 
			$a=10;
		?>
		
		@php
			$a=10;
		@endphp
		
		<hr>
		
		<?php
		/*
		Blade Conditional Directives
		
		@php @endphp
		@if  @elseif @else and @endif  
		@unless @endunless inverse of if  opposite of if 
		@isset @endisset  
		*/
		?>
		<?php $name="Mahesh"?>
		@if($name=="Raj")
		<h1>Hi my name is {{$name}}</h1>
		@elseif($name=="Mahesh")
		<h1>Hi my name is {{$name}}</h1>
		@else
		<h1>Unknown</h1>	
		@endif

		<hr>
		
		<?php
		/*
		Blade Looping Directives

		@for and @endfor
		@while and @endwhile
		@foreach and @endforeach
		@break @continue
		
		*/
		?>

		@for($i=1;$i<=10;$i++)
		<h4>{{$i}}</h4>	
		@endfor
	
		<?php $data=['sam','raj','mahesh'];?>

		@foreach($data as $d)
		<h4>{{$d}}</h4>
		@endforeach


	
		<hr>
	
	
	
		<?php
		/*
		Layout Blade Directives
		@include
		@yield directive is used to display the content of a given section
		@section and @endsection   directives define a section of content

		@extends blade directives specify which layout the child view should “inherit”

		@stack  render the complete stack content , pass the name of the stake
		@push and @endpush  is used to push the stack


		
		*/
		?>
	
	
	</body>
</html>
