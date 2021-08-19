{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   
    <style>
        
        html { 
  background: url('error/wallpaperflare-cropped.jpeg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

    body {
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
		}

button {
			width: 200px;
			height: 40px;
			color: #00fff5;
			font-size: 20px;
			text-transform: uppercase;
			letter-spacing: 2px;
			border-radius: 0;
			border: none;
			border-top: 2px solid #00fff5;
			border-bottom: 2px solid #00fff5;
			outline: none;
			background: transparent;
			transition: 0.5s;
		}
		.button1:hover {
			box-shadow: 0 0 5px #00fff5,
						 0 0 10px #00fff5,
						 0 0 30px #00fff5,
						 0 0 60px #00fff5,
						 0 0 120px #00fff5;
			background: #5efff9;
			color: #112;
		}
		.button2 {
			border-top-color: #42f747;
			border-bottom-color: #42f747;
			color: #42f747;
		}
		.button2:hover {
			box-shadow: 0 0 5px #42f747,
						 0 0 10px #42f747,
						 0 0 30px #42f747,
						 0 0 60px #42f747,
						 0 0 120px #42f747;
			background: #42f747;
			color: #112;
		}

    </style>
 
	<button class="button1" onclick="goBack()">
		Go Back !
	</button>
	<button class="button2" onclick="goHome()">
		To Home
	</button>
<script>
function goBack() {
  window.history.back();
}
function goHome() {
  window.location.href = "/home";
}
</script>
</body>
</html>