<?php

$string="Lorem Ipsum is simply dummy text of the printing and typesetting industry. lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
$string.="lorem Ipsum is simply dummy text of the printing and typesetting industry. lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
				// find  // replace
				
echo str_replace("Lorem","Tops",$string)."<br><br><br>"; // case sensitive
echo str_ireplace("Lorem","Tops",$string)."<br>"; // case insensitive
?>