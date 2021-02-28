<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600&display=swap" rel="stylesheet">
	 
    <script src="{{ asset('js/p5.min.js')}}"></script>
    <script src="{{ asset('js/p5.dom.min.js')}}"></script>
    <script src="{{ asset('js/p5.sound.min.js')}}"></script>    
	<script src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>

    <style>
    	html, body {
		  margin: 0;
		  padding: 0;
		}
		.cover{
			background: #fff;
			width: 100%;
			height: 100vh;
			position: absolute;
			z-index: 100;
		}
		.lds-ripple{
			z-index: 200;
		}
    </style>
</head>
<body>
	<span style="width: 100%;" id="forLoader">		
		<div class="cover"></div>
		<div class="lds-ripple" id="exploader"><div></div><div></div></div>
	    <script src="{{ asset('experiments/pendulum/sketch.js')}}"></script>
	</span>
    <script src="{{ asset('experiments/pendulum/pendulum.js')}}"></script>
    <script type="text/javascript">
    	$(document).ready(function () {
    		$('#forLoader').hide();
    	})
    </script>
</body>
</html>