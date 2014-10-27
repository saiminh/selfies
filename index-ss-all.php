<!DOCTYPE html>
<html>
<head>
	<title>Laureate selfies</title>
	<link rel="stylesheet" href="css/normalize.css" />
	<style type="text/css">
		body{		
			background: #351424;
		}		
		.llm-logo{
			position: absolute;
			z-index: 5;
			width: 250px;
			height: 162px;
		}
		.container{	
			position: absolute;
			top:0;
			left: 0;
			overflow: hidden;
			width: 100%;
			height: 100%;			
			opacity: 0;
			transition:opacity 0.9s ease;
		}
		.container.loaded{
			opacity: 1;
		}

		.container img{
			position: relative;
			display: none;
		}
		.container img:first-child{
			display: block;
		}
		.date{
			position: absolute;
			bottom:20px;
			right: 20px;
			font-family: Georgia, serif;
			font-size: 24px;
			color: #FFF;

		}
		@media screen and (max-width: 400px){
			.llm-logo{
				left: 50%;
				margin-left: -125px;
			}
		}
	</style>
</head>
<body>
	<img class="llm-logo" src="img/LaurelLeaveMemories.svg" alt="Laurel Leave Memories" />
	
	<div class="container">		
		<?php 

			$directory = "Pictures/";

			//get all image files with a .jpg extension.
			$images = glob($directory . "*.jpg");

			//print each file name
			foreach($images as $image)
			{
			  echo '<img src="', $image, '" />';
			}
		?>
	</div>

<script src="js/jquery.min.js"></script>
 <script type="text/javascript">
 	 $(".container > img").load( function(){
            	$(".container").addClass("loaded");
            	resizeImage();		
            });    

	var win = $(window);
	
	function resizeImage() {
		var	winHeight = win.height(),
			winWidth = win.width(),
			winRatio = winWidth / winHeight,
			image = $(".container > img"),
			imageHeight = image.height(),
			imageWidth = image.width(),
			imageRatio = imageWidth / imageHeight;

		if (winRatio > imageRatio) {
			var newHeight = Math.round(winWidth / imageRatio)
			image.css({
				width: winWidth,
				height: newHeight,
				top: (winHeight / 2) - (newHeight / 2),
				left: 0
			});
		}
		else {
			var newWidth = Math.round(winHeight * imageRatio)
			image.css({
				width: newWidth,
				height: winHeight,
				top: 0,
				left:  (winWidth / 2) - (newWidth / 2)
			})
		};
	};	
	resizeImage();
// call resizeImage on window load and resize 				
	win.bind({
	    load: function() {
	      resizeImage();
	    },
	    resize: function() {
	      resizeImage();
	    }
	});
	$(".container").click(function(){
		location.reload();
		//$(this).prepend("<img src=\"Pictures/rotate.php\" alt=\"Header\" />");
	})

 </script>
	


</body>
</html>